<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostEditRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\DeleteModelTraits;
use App\Traits\StoreImageTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    use StoreImageTraits;
    use DeleteModelTraits;

    private $model, $post, $category, $tag;
    private $model_name = 'post';
    private $model_names = 'posts';

    public function __construct(Post $post, Category $category, Tag $tag)
    {
        $this->model = $post;
        $this->post = $post;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function index()
    {
        if (empty($_GET['post_status'])) $post_status = '';
        else $post_status = $_GET['post_status'];

        $all = $this->model->get();
        $trash = $this->model->onlyTrashed()->get();
        $countAll = count($all);
        $countTrash = count($trash);

        if ($post_status == 'trash') $models = $this->model->onlyTrashed()->latest()->paginate(10);
        else $models = $this->model->latest()->paginate(10);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.posts.index', compact('models', 'model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory();
        return view('adminlayouts.posts.add', compact('htmlOption'));
    }

    public function getCategory($category_id = "")
    {
        $data = $this->category->where('type', 'post')->get();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->optionCategoryRecusive(0, $category_id);
        return $htmlOption;
    }

    public function store(PostAddRequest $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->slug))
                $slug = Str::slug($request->title);
            else $slug = $request->slug;
            $dataStore = [
                'title' => $request->title,
                'user_id' => auth()->id(),
                'slug' => $slug,
                'category_id' => $request->category_id,
                'content' => $request->contents,
            ];
            if ($request->hasFile('feature_image_path')) {
                $data = $this->storeTraitUpload($request->file('feature_image_path'), 'posts');
                if (!empty($data)) {
                    $dataStore['feature_image_name'] = $data['name'];
                    $dataStore['feature_image_path'] = $data['path'];
                }
            }
            $post = $this->post->create($dataStore);
            if ($request->tag) {
                foreach ($request->tag as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance->id;
                }
                $post->tags()->attach($tagId);
            }
            DB::commit();
            return redirect()->route('posts.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        $htmlOption = $this->getCategory($post->category_id);
        return view('adminlayouts.posts.edit', compact('post', 'htmlOption'));
    }

    public function update(PostEditRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            //update post
            if (empty($request->slug))
                $slug = Str::slug($request->title);
            else $slug = $request->slug;
            $dataStore = [
                'title' => $request->title,
                'user_id' => auth()->id(),
                'slug' => $slug,
                'category_id' => $request->category_id,
                'content' => $request->contents,
            ];
            $post = $this->post->find($id);
            if ($request->hasFile('feature_image_path')) {
                $data = $this->storeTraitUpload($request->file('feature_image_path'), 'posts');
                if (!empty($data)) {
                    $dataStore['feature_image_name'] = $data['name'];
                    $dataStore['feature_image_path'] = $data['path'];
                }
                $this->deleteTraitUpload($post->feature_image_path);
            }
            $post->update($dataStore);

            //update post tags
            if ($request->tag) {
                foreach ($request->tag as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance->id;
                }
                $post->tags()->sync($tagId);
            } else $post->tags()->sync([]);

            DB::commit();
            return redirect()->route('posts.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->post);
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
