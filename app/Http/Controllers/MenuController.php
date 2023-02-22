<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    use DeleteModelTraits;

    protected $model, $menu;
    private $model_name = 'menu';
    private $model_names = 'menus';

    public function __construct(Menu $menu)
    {
        $this->model = $this->menu = $menu;
    }

    public function index()
    {
        $post_status = '';

        $all = $this->model->get();
        $countAll = count($all);
        $countTrash = '';

        $models = $this->model->latest()->paginate(20);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.menus.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }

    public function create()
    {
        $htmlOption = $this->getMenu();
        return view('adminlayouts.menus.add', compact('htmlOption'));
    }

    public function getMenu($current_id = "", $current_parent_id = "")
    {
        $data = $this->menu->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->optionRecusive(0, $current_id, $current_parent_id);
        return $htmlOption;
    }

    public function store(MenuRequest $request)
    {
        try {
            $this->menu->create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name),
            ]);
            return redirect()->route('menus.index');
        } catch (\Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->id, $menu->parent_id);
        return view('adminlayouts.menus.edit', compact('menu', 'htmlOption'));
    }

    public function update($id, MenuRequest $request)
    {
        try {
            $this->menu->find($id)->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name),
            ]);
            return redirect()->route('menus.index');
        } catch (\Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->menu);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }
}
