<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Image, File, Storage;

class StorageServices
{
 
    /**
     * Store file in folders
     */
    public static function saveFile(Request $request,$image, $folderName='', $location, $originalFilename,$width,$height, $largeFile=[])
    {       
        Storage::disk(config('app.storage_disk'))->makeDirectory('images/'.$folderName);
        Storage::disk(config('app.storage_disk'))->makeDirectory('images/'.$folderName.'/thumbnail');
       
        $fileName = $location.'thumbnail/'.$originalFilename;
        Storage::disk(config('app.storage_disk'))->putFileAs('images/'.$folderName, $image,  $originalFilename);   //original file save    
        Image::make(file_get_contents($image))->resize($width,$height)->save(storage_path('app/' . $fileName)); //resize file save
        if(!empty($largeFile)){
            $fileName =  $location.'large/'.$originalFilename;
            Storage::disk(config('app.storage_disk'))->makeDirectory('images/'.$folderName.'/'.$largeFile[0]);
            Image::make(file_get_contents($image))->resize($largeFile[1],$largeFile[2])->save(storage_path('app/' . $fileName));
        }
        return true;
    }
}
