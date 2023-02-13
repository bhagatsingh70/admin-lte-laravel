<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Image, File, Storage;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
  
    

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        // $path = public_path().'/images/thumbnail';
        // File::makeDirectory($path, $mode = 0777, true, true);
        // $destinationPath = public_path('/images/thumbnail');
        // $img = Image::make($image->getRealPath());
        // $img->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);

        Storage::disk('public')->makeDirectory('images/thumbnail');
        Storage::disk('public')->makeDirectory('news');


        // $img->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save(storage_path('app/public/images/thumbnail/' .$input['imagename']));
   

        // $destinationPath = public_path('/images');
        // $image->move(storage_path('app/public/images/' .$image->getClientOriginalName()));

        $imageName = $image->getClientOriginalName();
        $location = 'public/images/thumbnail/' ;
        $originalFilename = time() . '-' . $imageName;
        Storage::disk('local')->putFileAs('public/images', $image,  $originalFilename);
        $fileName =  $location.$originalFilename;
        Image::make($image)->resize(600,300)->save(storage_path('app/' . $fileName));
        $product = new Product();
        $product->product_name = $request->pname;
        $product->image=$originalFilename;
        $product->save();
        return response($product, 200)
                  ->header('Content-Type', 'text/plain');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
