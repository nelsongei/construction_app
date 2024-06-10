@extends('layouts.site.main')
@section('title','Track')
@section('content')
    <div class="section">
        <div class="container mt-4">
            <div class="row py-4">
                <div class="col-sm-9 m-auto">
                    @forelse($orders as $order)
                        <div class="card mb-1">
                            <div class="card-body text-center" id="">
                                <div class="label label-secondary mb-3">
                            <span class="h6">
                                <i class="fa fa-clock"></i>&nbsp;
                                {{date('d M H:m',strtotime($order->created_at))}}
                            </span>
                                </div>
                                <h5>Order #{{$order->order_no}}</h5>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 py-3">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="progress" style="height: 8px">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                                         data-status-group="default" data-status-width="50"
                                                         style="width: 50%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="progress" style="height: 8px">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                                         data-status-group="processing" data-status-width="0"
                                                         style="width: 0%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="progress" style="height: 8px">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                                         data-status-group="completed" data-status-width="0"
                                                         style="width: 0%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 style="color: #686663;">{{$order->status_name->name}}</h3>
                                <p class="lead">{{$order->status_name->comment}}</p>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-light text-danger" data-bs-toggle="modal"
                                            data-bs-target="#cancelOrderModal">Cancel order
                                    </button>
                                    <div class="modal fade" id="cancelOrderModal" aria-labelledby="cancelOrderModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form method="POST" data-request="orderPage::onCancel">
                                                <input type="hidden" name="orderId" value="2">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="cancelOrderModalLabel">Cancel
                                                            Order</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                <textarea class="form-control" name="cancel_reason"
                                                          id="cancelOrderReason" rows="3"
                                                          placeholder="Reason for cancellation"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                                data-attach-loading="">
                                                            Cancel order
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
