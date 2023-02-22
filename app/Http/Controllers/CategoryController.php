<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use DeleteModelTraits;

    private $model, $category;
    private $model_name = 'category';
    private $model_names = 'categories';

    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->category = $category;
    }

    public function index($type)
    {
        if(empty($_GET['post_status'])) $post_status = '';
        else $post_status = $_GET['post_status'];

        $all = $this->model->where('type', $type)->get();
        $trash = $this->model->onlyTrashed()->where('type', $type)->get();
        $countAll = count($all);
        $countTrash = count($trash);

        if($post_status == 'trash') $models = $this->model->onlyTrashed()->where('type', $type)->latest()->paginate(10);
        else $models = $this->model->where('type', $type)->latest()->paginate(10);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.categories.index', compact('models', 'model_name', 'model_names', 'type', 'post_status', 'countAll', 'countTrash'));
    }

    public function create($type)
    {
        $htmlOption = $this->getCategory($type);
        return view('adminlayouts.categories.add', compact('htmlOption', 'type'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            $slug = $request->slug;
            if (empty($slug)) {
                $slug = Str::slug($request->name);
            }
            $this->category->create([
                'name' => $request->name,
                'slug' => $slug,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
                'type' => $request->type
            ]);
            return redirect()->route('categories.index', ['type' => $request->type]);
        } catch (\Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function getCategory($type, $current_id = "", $current_parent_id = "")
    {
        $data = $this->category->where('type', $type)->get();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->optionRecusive(0, $current_id, $current_parent_id);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->type, $category->id, $category->parent_id);
        return view('adminlayouts.categories.edit', compact('category', 'htmlOption'));
    }

    public function update($id, CategoryRequest $request)
    {
        try {
            $slug = $request->slug;
            if (empty($slug)) {
                $slug = Str::slug($request->name);
            }
            $this->category->find($id)->update([
                'name' => $request->name,
                'slug' => $slug,
                'parent_id' => $request->parent_id,
                'description' => $request->description
            ]);
            return redirect()->route('categories.index', ['type' => $request->type]);
        } catch (\Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->model);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }

    public function removeTrash(Request $request)
    {
        return $this->removeTrashTraits($request->listItemId, $this->model_name, $this->model);
    }

    public function recovery(Request $request)
    {
        return $this->recoveryTraits($request->listItemId, $this->model_name, $this->model);
    }
}
