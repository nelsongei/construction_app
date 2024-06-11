<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors  = User::where('user_type_id',2)->count();
        $clients  = User::where('user_type_id',3)->count();
        $orders = Order::count();
        $revenue = Order::sum('total_price');

        //
        $month = collect([]);
        $order_data = collect([]);
        $months = [];

        for ($i = 11; $i > -1; $i--) {
            $months[] = date("Y-m-d", strtotime(date('Y-m-01') . " -$i months"));
        }

        foreach ($months as $m) {
            $month->push(date('M-Y', strtotime($m)));
            $order_data->push(Order::whereBetween('created_at', [date('Y-m-01 00:00:00', strtotime($m)), date('Y-m-t 23:59:59', strtotime($m))])->sum('total_price'));
        }
        //Orders Chart
        $orders_chart = new DashboardChart();
        $orders_chart->labels = $month;
        $orders_chart->dataset('Orders', 'line', $order_data)
            ->color("#007200")
            ->backgroundColor("#007200")
            ->fill(false);
        return view('home',compact('vendors','clients','orders','revenue','orders_chart'));
    }
}
