<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    //
    public function orders()
    {
        $orders = Order::orderBy('created_at')->get();
        return view('orders.index',compact('orders'));
    }
}
