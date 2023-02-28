<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Image, File, Storage;
use App\Models\{Brand, Product, Category, ProductImage};
use App\Http\Requests\ProductStoreRequest;
use App\Http\Services\StorageServices;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard');
    }

 
}
