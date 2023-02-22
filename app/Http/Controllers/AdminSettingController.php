<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTraits;

class AdminSettingController extends Controller
{
    use DeleteModelTraits;
    private $model, $setting;
    private $model_name = 'setting';
    private $model_names = 'settings';

    public function __construct(Setting $setting){
        $this->model = $this->setting = $setting;
    }

    public function index(){
        $post_status = '';

        $all = $this->model->get();
        $countAll = count($all);
        $countTrash = '';

        $models = $this->model->latest()->paginate(20);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.settings.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }

    public function create(){
        return view('adminlayouts.settings.add');
    }

    public function store(SettingRequest $request){
        try{
            $dataInsert = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
                'type' => $request->type,
            ];
            $this->setting->create($dataInsert);
            return redirect()->route('settings.index');
        } catch (\Exception $exception){
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id){
        $setting = $this->setting->find($id);
        return view('adminlayouts.settings.edit', compact('setting'));
    }

    public function update( SettingRequest $request, $id){
        try{
            $setting = $this->setting->find($id);
            $dataUpdate = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
            ];
            $setting->update($dataUpdate);
            return redirect()->route('settings.index');
        }  catch (\Exception $exception){
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }
    public function delete($id){
        return $this->deleteModelTraits($id, $this->setting);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }
}
