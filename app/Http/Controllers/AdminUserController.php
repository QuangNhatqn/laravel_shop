<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTraits;

class AdminUserController extends Controller
{
    use DeleteModelTraits;
    private $model, $user, $role;
    private $model_name = 'user';
    private $model_names = 'users';

    public function __construct(User $user, Role $role){
        $this->model = $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $post_status = '';

        $all = $this->model->get();
        $countAll = count($all);
        $countTrash = '';

        $models = $this->model->latest()->paginate(20);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.users.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }
    public function create(){
        $roles = $this->role->all();
        return view('adminlayouts.users.add', compact('roles'));
    }
    public function store(UserAddRequest $request){
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }
    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $user->roles;
        return view('adminlayouts.users.edit', compact('user', 'roles', 'rolesOfUser'));

    }
    public function update(UserEditRequest $request, $id){
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            if(!empty($request->password)){
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id){
        return $this->deleteModelTraits($id, $this->user);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }
}
