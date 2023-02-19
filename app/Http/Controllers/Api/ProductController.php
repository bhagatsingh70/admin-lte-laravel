<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Models\{Product, Price, Brand, Category};

class ProductController extends BaseController
{
    public function productList(Request $request)
    {
        /**
         * Get product list API
         * @param $fist for category navigation 
         * @param $second for category child navigation
         */
        try{       
            $productList = [];     
            if(!empty($request->second)){                
                $catId = Category::where('slug', $request->second)->pluck('id');              
            }elseif(!empty($request->first)){
                $catId = Category::where('slug', $request->first)->pluck('id');     
            }
            $list = Product::select('category_id','price','discounted_price','product_name','id','slug','image')
            ->status()->where('category_id', $catId)->get();
            foreach($list as $products){
                $products['product_name'] = Str::limit($products->product_name, 20);
                $productList[] = $products;
            }
            return $this->sendResponse($productList,'Listing fetched successfully');

        }catch(\Exception $ex){
            dd($ex);
        }
    }

    /**
     * Get filters masters list
     * @return json
     */
    public function filtersList(Request $request){
        $listBrand = Brand::active()->get();
        $listCategory = Category::active()->get();
        $listPrice = Price::active()->get();
        return $this->sendResponse(['brands_list'=> $listBrand, 'price_list' => $listPrice, 'category_list'=> $listCategory], __('message.list_fetched'));
    }
}
