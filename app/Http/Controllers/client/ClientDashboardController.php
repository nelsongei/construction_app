<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function orders()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('client.orders',compact('orders'));
    }
}
