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
    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        return response($product,201);
    }
}
