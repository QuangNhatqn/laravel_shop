<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StoreImageTraits{
    public function storeTraitUpload($feature_image_file, $folderName)
    {
        $path = $feature_image_file->store('public/' . $folderName . '/' . auth()->id());
        $dataUploadTrait = [
            'name' => $feature_image_file->getClientOriginalName(),
            'path' => $path,
        ];
        return $dataUploadTrait;
    }

    public function deleteTraitUpload($path)
    {
        $a = Storage::delete($path);
    }

};
