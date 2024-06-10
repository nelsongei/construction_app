<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        $products = Product::orderBy('id')->get();
        return view('welcome',compact('categories','products'));
    }
}
