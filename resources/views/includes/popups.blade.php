<link href="{{asset('assets/site/css/checkbox.css')}}" rel="stylesheet">
<div class="modal fade" id="buy_now_modal" tabindex="-1" aria-labelledby="buy_now_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="buy_now_modal_heading">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4><b>Product Name: </b>
                    <input type="text" name="product_name" style="outline:none;border:none"
                           readonly class="product_name"></h4>
                <input type="hidden" class="product_price" name="price">
                <input type="hidden" class="product_id" name="product_id">
                <div class="quantity buttons_added" style="float: right">
                    <input type="button" value="-" class="minus">
                    <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty"
                           class="input-text qty text" size="4" pattern="" inputmode="">
                    <input type="button" value="+" class="plus">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="purchase_now">
                    Purchase Now
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="buy_now">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="buy_now_menu_modal_heading">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4><b>Product Name: </b>
                    <input type="text" name="product_name" style="outline:none;border:none"
                           readonly class="product_name"></h4>
                <h5><label for="price">Price</label>
                    <input type="text" style="outline:none;border:none;background: #fff"
                           class="menu_item_price form-control mb-2" name="price" readonly></h5>
                <input type="hidden" class="menu_item_id" name="product_id">
                <div class="quantity buttons_added mt-2" style="float: right">
                    <input type="button" value="-" class="minus">
                    <input type="number" id="input-text" value="1" step="1" min="1" max="" name="quantity" title="Qty"
                           class="input-text qty text" size="4" pattern="" inputmode="">
                    <input type="button" value="+" class="plus">
                </div>
                <h5><label for="total">Total</label>
                    <input type="text" id="total" style="outline:none;border:none;background: #fff"
                           class="menu_item_total form-control mb-2" name="total" readonly></h5>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary btn-sm" id="purchase_menu_item">
                    Add To Order
                </button>
            </div>
        </div>
    </div>
</div>
<!--Reference Modal-->
<div class="modal fade" id="reference_modal" tabindex="-1" aria-labelledby="reference_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reference_modal_heading">Refer To User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="button" id="generate_link">
                    Generate Link
                </button>
                <div id="generated_link_features">
                    <input type="text" class="form-control mt-2" id="hashed_link" style="border:none" readonly>
                    <i id="copy_to_clipboard" class="fa fa-clipboard"
                       style="float: right;font-size: 30px;cursor: pointer;top: -44px;position:relative;"></i>
                    <a id="share_with_email"
                       style="float: right;top: -36px;position: relative;margin-right: 10px;cursor: pointer">Share with
                        email</a>
                </div>
                <div id="share_email">
                    <input type="hidden" id="hashed_link_for_mail" class="form-control">
                    <div class="form-group" id="">
                        <label>To</label>
                        <input type="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                    </div>
                    <button class="button mt-2" id="send_mail_btn">
                        Send Email
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="checkout-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Confirm Order Details</h6>
            </div>
            <form action="{{url('order/store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="local-control mt-2 mb-2">
                                <div class="btn-group btn-group-toggle w-100 text-center"
                                     data-control="order-type-toggle" data-handler="localBox::onChangeOrderType">
                                    <input id="btn-check-delivery" type="radio" name="order_type" class="btn-check"
                                           value="delivery" checked="checked">
                                    <label for="btn-check-delivery"
                                           class="btn btn-primary w-50"><strong>Delivery</strong>
                                        <span class="small center-block">
                                                in 15 min
                                            </span>
                                    </label>
                                    <input id="btn-check-collection" type="radio" name="order_type"
                                           class="btn-check" value="pick_up">
                                    <label for="btn-check-collection"
                                           class="btn btn-primary w-50 "><strong>Pick-up</strong>
                                        <span class="small center-block">
                                                in 15 min
                                            </span>
                                    </label>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody class="cart_item">
                                <!-- Add more rows for other products -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="cart-totals">
                        <div class="cart-total">
                            <div class="table-responsive">
                                <table class="table table-none">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-muted">
                                                Sub Total:
                                           </span>
                                        </td>
                                        <td class="text-right sub_total">
                                        </td>
                                    </tr>
                                    @if(auth()->user())
                                        <tr>
                                            <td colspan="2">
                                                <span class="text-muted">
                                                    Use Points
                                                </span>
                                                <div class="row">
                                                    <div class="col-sm-6 float-left">
                                                        <div class="checkbox-wrapper-22">
                                                            <label class="switch" for="use_points">
                                                                <input type="checkbox" name="use_points" id="use_points"/>
                                                                <div class="slider round"></div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4" id="point_input" style="display: none">
                                                        <div class="quantity buttons_added mt-2" style="float: right">
                                                            <input type="button" value="-" class="minus">
                                                            <input type="number" id="input_text_point"
                                                                   value="{{auth()->user()->points}}" step="1" min="1"
                                                                   max="{{auth()->user()->points}}"
                                                                   name="input_text_point" title="Qty"
                                                                   class="input-text qty text" size="4" pattern=""
                                                                   inputmode="">
                                                            <input type="button" value="+" class="plus">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <span class="text-muted">
                                                Delivery:
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            Free
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-muted">
                                                Order Total:
                                           </span>
                                        </td>
                                        <td class="text-right grand_total">
                                        </td>
                                        <input type="hidden" class="final_total" name="final_total">
                                        <input type="hidden" class="total_quantity" name="total_quantity">
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-sm btn-block btn-primary">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
