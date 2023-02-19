<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\{Price};
use Illuminate\Support\Facades\Redis;

class PriceController extends BaseController
{

    /**
     * Get products list
     * @return json
     */
    public function list(){
        $list = Price::get();
        return $this->sendResponse($list,'Listing fetched successfully');
    }


}
