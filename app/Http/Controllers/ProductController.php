<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Image, File, Storage;
use App\Models\{Brand, Product, Category, ProductImage};
use App\Http\Requests\ProductStoreRequest;
use App\Http\Services\StorageServices;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catgories = Category::with('child','parentCategory')->active()->get();
        $brands= Brand::active()->get();
        return view('product.add-product', compact('catgories','brands'));
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

        // Storage::disk('public')->makeDirectory('images/product');
        // Storage::disk('public')->makeDirectory('images/product/thumbnail');
 


        // $img->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save(storage_path('app/public/images/thumbnail/' .$input['imagename']));


        $imageName = $image->getClientOriginalName();
        $location = 'public/images/product/' ;
        $originalFilename = time() . '-' . $imageName;
        $fileName =  $location.'thumbnail/'.$originalFilename;

        StorageServices::saveFile($request,$image, $folderName='product',  $location, $originalFilename,'285','285', ['large','500','500']);


      //  Storage::disk('public')->putFileAs('images/product', $image,  $originalFilename);
       
        //Image::make($image)->resize(285,285)->save(storage_path('app/' . $fileName));
        $product = new Product();
        $product->product_name = $request->pname;
        $product->slug = $request->product_name;
        $product->image=$originalFilename;        
        $product->price = $request->price;
        $product->discounted_price = $request->discounted_price;
        $product->discount = $request->discount;
        $product->price_description = $request->price_description;
        $product->description = $request->description;
        $product->key_benifits = $request->key_benifits;
        $product->direction_for_usage = $request->direction_for_usage;
        $product->other_information = $request->other_information;
        $product->category_id = $request->category_id;
        $product->tags = $request->tags;
        $product->brand_id = $request->brand_id;
        $product->save();
        if($request->hasFile('multiple_image')){
            $multiple_image =  $request->file('multiple_image');
             foreach($multiple_image as $img){         
                $multiImageName = $img->getClientOriginalName();
                $location = 'public/images/product/' ;
                $originalFilenamem = time() . '-' . $multiImageName;
                $fileName =  $location.'thumbnail/'.$originalFilenamem;        
                StorageServices::saveFile($request,$img,'product',  $location, $originalFilenamem,'285','285', ['large','500','500']);
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_name =$originalFilenamem;
                $productImage->save();
            }
         }
     
        return response($product, 200)
                  ->header('Content-Type', 'text/plain');
     
    }


    public function list()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('product.product-list', compact('products'));
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        
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
