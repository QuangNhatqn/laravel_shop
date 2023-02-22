<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait DeleteModelTraits {
    public function deleteModelTraits($id, $model){
        try{
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function deleteMutipleTraits($listItemId, $model_name, $model){
        $this->checkPermissionDelete($listItemId, $model_name);
        try{
            DB::beginTransaction();
            foreach ($listItemId as $itemId) {
                $model->find($itemId)->delete();
            }
            DB::commit();
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function removeTrashTraits($listItemId, $model_name, $model){
        $this->checkPermissionDelete($listItemId, $model_name);
        try{
            DB::beginTransaction();
            foreach ($listItemId as $itemId) {
                $model->onlyTrashed()->find($itemId)->forceDelete();
            }
            DB::commit();
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function recoveryTraits($listItemId, $model_name, $model){
        $this->checkPermissionDelete($listItemId, $model_name);
        try{
            DB::beginTransaction();
            foreach ($listItemId as $itemId) {
                $model->onlyTrashed()->find($itemId)->restore();
            }
            DB::commit();
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function checkPermissionDelete($listItemId, $model_name)
    {
        foreach ($listItemId as $id)
            $this->authorize($model_name . '-delete', $id);
    }
}
