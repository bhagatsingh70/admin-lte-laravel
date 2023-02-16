<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Image, File, Storage;

class StorageServices
{
 
    /**
     * Store file in folders
     */
    public static function saveFile(Request $request,$image, $folderName='', $location, $originalFilename,$width,$height)
    {       
        Storage::disk('public')->makeDirectory('images/'.$folderName);
        Storage::disk('public')->makeDirectory('images/'.$folderName.'/thumbnail');
        $fileName =  $location.$originalFilename;
        Storage::disk('public')->putFileAs('images/'.$folderName, $image,  $originalFilename);   //original file save    
        Image::make($image)->resize($width,$height)->save(storage_path('app/' . $fileName)); //resize file save
        return true;
    }
}
