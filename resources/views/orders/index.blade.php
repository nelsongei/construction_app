@extends('layouts.admin.admin')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper">
                <h1>Orders</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="{{url('home')}}">
                                <span class="mdi mdi-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <table class="table mt-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Total Quantity</th>
                                    <th>Order No</th>
                                    <th>Order Type</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1?>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$order->total_quantity}}</td>
                                        <td>{{$order->order_no}}</td>
                                        <td>{{$order->order_type}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{$order->status}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">
                                            <i class="fa fa-file fa-5x"></i>
                                            <p>No Products</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
