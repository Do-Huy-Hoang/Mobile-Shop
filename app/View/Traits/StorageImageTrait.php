<?php

namespace App\View\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpload($request, $filedName, $folderName){
        if ($request->hasFile($filedName)){
            $file = $request->$filedName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = $file->getClientOriginalName();;
            $filePath = $request->file($filedName)->storeAs('public/'.$folderName, $fileNameHash);
            $dataUploadTrait= [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
       return null;
    }

    public function storageTraitUploadMutiple($file, $folderName){
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/'.$folderName, $fileNameHash);
            $dataUploadTrait= [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
    }
}
