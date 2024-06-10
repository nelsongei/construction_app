<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorDashbaordController extends Controller
{
    //
    public function index()
    {
        return view('vendor.dashboard');
    }
    public function products()
    {
        $categories = Category::orderBy('id')->get();
        $products = Product::where('user_id',Auth::user()->id)->orderBy('id')->get();
        return view('vendor.products',compact('products','categories'));
    }
}
