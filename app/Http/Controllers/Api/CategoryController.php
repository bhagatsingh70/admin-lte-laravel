<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function list(){
        $list = Category::with('child')->whereNull('parent')->orderBy('name','ASC')->get();
        return $this->sendResponse($list,'Listing fetched successfully');
    }
}
