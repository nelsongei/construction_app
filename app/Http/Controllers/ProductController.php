<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id')->get(['id', 'name']);
        $products = Product::orderBy('id')->get();
        return view('products.index', compact('products', 'categories'));
    }

    public function store(AddProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $file_name = $request->file('image');
            $path = $file_name->store('product/images', 'public');
            try {
                DB::beginTransaction();
                $product = new Product();
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category_id;
                $product->image = $path;
                $product->user_id = $request->user_id;
                $product->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->withErrors($e->getMessage());
            }
        }
        $request->session()->flash('alert-success', 'Product Successfully Saved');
        return back();
    }
}
