<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        $orders = Order::where('user_id',auth()->id())->paginate(10);
        $products =Product::where('user_id',auth()->id())->paginate(10);
        return view('site.orders.index',compact('products','orders','categories'));
    }
    public function view($id)
    {
        $order = Order::findOrFail($id);
        return view('site.orders.view',compact('order'));
    }
    public function store(Request $request)
    {
        if (auth()->user())
        {
            try{
                DB::beginTransaction();
                $orders = Order::count();
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->total_quantity = $request->total_quantity;
                $order->total_price = $request->final_total;
                $order->status_id = 1;
                $order->order_type = $request->order_type;
                $order->order_no = strtoupper(bin2hex(openssl_random_pseudo_bytes(2))).date('Y') . '/' . $orders;;
                $order->save();
                //
                //
                for($i=0, $iMax = count($request->menu_item_id); $i< $iMax; $i++)
                {
                    $order_item = new OrderItem();
                    $order_item->order_id = $order->id;
                    $order_item->product_id = $request->menu_item_id[$i];
                    $order_item->quantity = $request->quantity[$i];
                    $order_item->price = $request->price[$i];
                    $order_item->sub_total = $request->sub_total[$i];
                    $order_item->save();
                    /*
                     * Update Cart
                     * */
                    $cart = Cart::find($request->cart_id[$i]);
                    $cart->status = 1;
                    $cart->push();
                }
                DB::commit();
                return redirect('/track');

            }catch (\Exception $e){
                DB::rollBack();
                return  response(['error'=>$e]);
            }
        }
    }
    public function track()
    {
        $categories = Category::orderBy('id')->get();
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at')->get();
        return view('site.cart.track',compact('orders','categories'));
    }
}
