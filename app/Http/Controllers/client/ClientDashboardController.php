<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    //
    public function index()
    {
        return view('client.index');
    }
    public function products()
    {
        $products = Product::orderBy('id')->get();
        return view('client.products',compact('products'));
    }
}
