<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends BaseController
{
    /**
     * Get brands list
     */
    public function list(){
        $list = Brand::active()->get();
       return  $this->sendResponse($list, __('message.list_fetched'));
    }
}
