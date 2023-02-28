<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use Storage, Image;
use App\Http\Services\StorageServices;

class CategoryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category/add', ['categories'=> Category::all()]);
    }

    public function store(CategoryStoreRequest $request)
    {
        
        try{
            $image = $request->file('category_image');
            $location = 'public/images/category/';
            //$smallLocation = 'public/images/category/small/';
            $originalFilename = time() . '.' . $image->getClientOriginalExtension(); 
            $fileName =  $location.$originalFilename;
            // Image::make($image)->resize(150,150)->save(storage_path('app/' . $smallLocation.$originalFilename)); 
            StorageServices::saveFile($request,$image, $folderName='category',  $location, $originalFilename,'600','300');
            $product = new Category();
            $product->name = $request->category_name;
            $product->category_image=$originalFilename;
            $product->parent=$request->parent;
            $product->save();
            return response($product, 200)
                      ->header('Content-Type', 'text/plain');
        }catch(\Exception $ex){
            dd($ex);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {        
        return view('category/list', ['categories_list'=> Category::with('child')->get()]);
    }

}
