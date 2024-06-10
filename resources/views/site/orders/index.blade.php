@extends('layouts.site.main')

@section('content')
    <div class="section  mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Recent Orders') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Quantity</th>
                                    <th>Order Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1 ?>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>
                                            <strong>
                                                {{$order->order_no}}
                                            </strong>
                                        </td>
                                        <td>{{$order->total_quantity}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>
                                            <a href="{{url('/orders/'.$order->id)}}" class="btn btn-primary">
                                                <i class="fa fa-receipt"></i>
                                                View Order
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No Orders
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
