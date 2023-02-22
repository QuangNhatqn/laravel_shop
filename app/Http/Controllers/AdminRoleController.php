<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    use DeleteModelTraits;

    private $model, $role, $permission;
    private $model_name = 'role';
    private $model_names = 'roles';

    public function __construct(Role $role, Permission $permission)
    {
        $this->model = $this->role = $role;
        $this->permission = $permission;
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

        return view('adminlayouts.roles.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }

    public function create()
    {
        $permissions = $this->permission->where('parent_id', 0)->get();
        return view('adminlayouts.roles.add', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissions = $this->permission->where('parent_id', 0)->get();
        return view('adminlayouts.roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $role = $this->role->find($id);
            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->role);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }
}
