<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderEditRequest;
use App\Models\Slider;
use App\Traits\StoreImageTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTraits;

class AdminSliderController extends Controller
{
    use StoreImageTraits;
    use DeleteModelTraits;
    private $model, $slider;
    private $model_name = 'slider';
    private $model_names = 'sliders';

    public function __construct(Slider $slider){
        $this->model = $this->slider = $slider;
    }

    public function index(){
        $post_status = '';

        $all = $this->model->get();
        $countAll = count($all);
        $countTrash = '';

        $models = $this->model->latest()->paginate(10);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.sliders.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }
    public function create(){
        return view('adminlayouts.sliders.add');
    }
    public function store(SliderAddRequest $request){
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            if($request->hasFile('image_path')){
                $dataImage = $this->storeTraitUpload($request->file('image_path'), 'sliders');
                if(!empty($dataImage)){
                    $dataInsert['image_name'] = $dataImage['name'];
                    $dataInsert['image_path'] = $dataImage['path'];
                }
            }
            $this->slider->create($dataInsert);
            return redirect()->route('sliders.index');
        } catch (\Exception $exception){
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id){
        $slider = $this->slider->find($id);
        return view('adminlayouts.sliders.edit', compact('slider'));
    }

    public function update(SliderEditRequest $request, $id){
        try{
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $slider = $this->slider->find($id);
            if($request->hasFile('image_path')){
                $dataImage = $this->storeTraitUpload($request->file('image_path'), 'sliders');
                if(!empty($dataImage)){
                    $dataUpdate['image_name'] = $dataImage['name'];
                    $dataUpdate['image_path'] = $dataImage['path'];
                }
                $this->deleteTraitUpload($slider->image_path);
            }
            $slider->update($dataUpdate);
            return redirect()->route('sliders.index');
        } catch (\Exception $exception){
            Log::error('Error : ' . $exception->getMessage() . '. Line : ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id){
        return $this->deleteModelTraits($id, $this->slider);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }
}
