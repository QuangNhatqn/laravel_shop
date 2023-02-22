<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminPermissionController extends Controller
{
    use deleteModelTraits;
    private $model, $permission;
    private $model_name = 'role';
    private $model_names = 'roles';

    public function __construct(Permission $permission)
    {
        $this->model = $this->permission = $permission;
    }

    public function index()
    {
        $post_status = '';

        $all = $this->model->get();
        $countAll = count($all);
        $countTrash = '';

        $models = $this->permission->where('parent_id', 0)->latest()->paginate(5);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.permissions.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }

    public function create()
    {
        return view('adminlayouts.permissions.add');
    }

    public function store(PermissionRequest $request)
    {
        try {
            DB::beginTransaction();
            if ($this->permission->where('name', $request->module_name)->where('parent_id', 0)->count() == 0) {
                $permission_parent = $this->permission->create([
                    'name' => ucwords($request->module_name),
                    'display_name' => ucwords($request->module_name),
                    'parent_id' => 0,
                    'key_code' => 0
                ]);
            } else $permission_parent = $this->permission->where('name', $request->module_name)->where('parent_id', 0)->first();

            if (empty($request->key_code)) {
                $key_code = str_replace('-', '_', Str::slug($request->name));
            } else $key_code = $request->key_code;

            $this->permission->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'parent_id' => $permission_parent->id,
                'key_code' => $key_code
            ]);

            DB::commit();
            return redirect()->route('permissions.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id)
    {
        $permission = $this->permission->find($id);
        return view('adminlayouts.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            if ($this->permission->where('name', $request->module_name)->where('parent_id', 0)->count() == 0) {
                $permission_parent = $this->permission->create([
                    'name' => ucwords($request->module_name),
                    'display_name' => ucwords($request->module_name),
                    'parent_id' => 0,
                    'key_code' => 0
                ]);
            } else $permission_parent = $this->permission->where('name', $request->module_name)->where('parent_id', 0)->first();
            if (empty($request->key_code)) {
                $key_code = str_replace('-', '_', Str::slug($request->name));
            } else $key_code = $request->key_code;

            $permission = $this->permission->find($id);
            $permission->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'parent_id' => $permission_parent->id,
                'key_code' => $key_code
            ]);
            DB::commit();
            return redirect()->route('permissions.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id){
        return $this->deleteModelTraits($id, $this->permission);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }
}
