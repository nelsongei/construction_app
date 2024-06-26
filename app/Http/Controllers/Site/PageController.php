<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function addToCart(Request $request)
    {
        if (!auth()->user()) {
            return response(['error' => 'Please login to proceed'], 403);
        }

        $user = auth()->user();
        $menu_item = Product::find($request->product_id);

        if (!$menu_item) {
            return response(["error" => "Unable to find the menu item, Please Contact Support"], 402);
        }

        try {
            DB::beginTransaction();
            $existingCartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $request->product_id)
                ->where('status', 0)
                ->first();
            if ($existingCartItem) {
                $existingCartItem->quantity += $request->quantity;
                $existingCartItem->sub_total += $request->sub_total;
                $existingCartItem->save();
            } else {
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'sub_total' => $request->sub_total,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response(["error" => "Unable to purchase the product, Please Contact Support"], 402);
        }
        $carts = Cart::where('status', 0)
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at')
            ->get();
        $groupedCarts = $carts->groupBy('product_id');
        $processedCarts = $groupedCarts->map(function ($cartGroup) {
            // Calculate total quantity and total sub-total for each group
            $cartGroup->load('menu_item');
            $totalQuantity = $cartGroup->sum('quantity');
            $totalSubTotal = $cartGroup->sum('sub_total');
            $itemName = $cartGroup->first()->menu_item->name;
            $price = $cartGroup->first()->menu_item->price;
            $cart_id = $cartGroup->first()->id;
            $id = $cartGroup->first()->menu_item->id;
            return [
                'total_quantity' => $totalQuantity,
                'total_sub_total' => $totalSubTotal,
                'items' => count($cartGroup),
                'item_name' => $itemName,
                'price' => $price,
                'menu_item_id'=>$id,
                'cart_id'=>$cart_id
            ];
        });
        $total = Cart::where('status',0)
            ->where('user_id',Auth()->user()->id)
            ->sum('sub_total');
        $total_quantity = Cart::where('status',0)
            ->where('user_id',Auth()->user()->id)
            ->sum('quantity');
        return response(['message' => 'Menu Item Added To Cart','status'=>'success','carts'=>$processedCarts,'total'=>$total,'total_quantity'=>$total_quantity], 201);
    }
}
