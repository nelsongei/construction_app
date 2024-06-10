@extends('layouts.site.main')
@section('title','Cart')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row py-4 mt-5">
                <div class="col-lg-2 d-none d-lg-inline-block">
                    <div class="categories affix-categories">
                        <ul class="nav flex-column nav-categories">
                            <li class="nav-item">
                                <a class="nav-link fw-bold active" href="http://127.0.0.1:8000/default/menus">All
                                    Categories</a>
                            </li>
                            @forelse($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{$category->id}}">{{$category->name}}</a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <a class="nav-link" href="#">No Categories</a>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <div id="local-box">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row boxes">
                                        <div class="box-one col-sm-6">
                                            <dl class="no-spacing">
                                                <dd><h1 class="h3">Default</h1></dd>
                                                <dd class="text-muted">
                                                    <div class="rating rating-sm">
                                                        <span class="fa-star far"></span>
                                                        <span class="fa-star far"></span>
                                                        <span class="fa-star far"></span>
                                                        <span class="fa-star far"></span>
                                                        <span class="fa-star far"></span>
                                                        <span class="small">(0)</span>
                                                    </div>
                                                </dd>
                                                <dd>
                                                    <span class="text-muted">Broad Ln, , Coventry, , </span>
                                                </dd>
                                            </dl>
                                        </div>
                                        <div class="box-divider d-block d-sm-none"></div>
                                        <div id="local-box-two" class="box-two col-sm-6">
                                            <dl class="no-spacing">
                                                <dt><span class="text-success">We are open</span></dt>

                                                <dd>
                                                    <span class="fa fa-clock"></span>&nbsp;&nbsp;
                                                    <span>24 hours, 7 days.</span>
                                                </dd>

                                                <dd class="text-muted">
                                                    Delivery and pick-up available
                                                </dd>
                                                <dd class="text-muted">

                                                </dd>
                                            </dl>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul id="nav-tabs" class="nav-menus nav nav-tabs py-2">
                            <li class="nav-item">
                                <a class="nav-link rounded-pill py-1 fw-bold active"
                                   href="#">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill py-1 fw-bold text-muted"
                                   href="#">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill py-1 fw-bold text-muted"
                                   href="#">Info</a>
                            </li>
                        </ul>
                        <div class="card">
                            <div class="menu-search">
                                <div class="py-3 px-4 border-top border-bottom">
                                    <form id="menu-search" method="GET" role="form"
                                          action="http://127.0.0.1:8000/default/menus">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            <input type="search" class="form-control" name="q"
                                                   placeholder="Search menu items." value="" autocomplete="off">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="menu-list">
                                <div class="menu-group">
                                    <div class="menu-group-item" style="  padding-left: 1rem;padding-right: 1rem;">
                                        <div class="menu-items">
                                            @forelse($menu_items as $menu_item)
                                                <div id="menu{{$menu_item->id}}" class="menu-item"
                                                     style="padding-top: 1rem;padding-bottom: 1rem">
                                                    <div class="d-flex flex-row">
                                                        <div class="menu-content flex-grow-1 mr-3">
                                                            <h6 class="menu-name">{{$menu_item->menu_item->name}}</h6>
                                                            <p class="menu-desc text-muted mb-0">
                                                                {{$menu_item->menu_item->description}}
                                                            </p>
                                                        </div>
                                                        <div class="menu-detail d-flex justify-content-end col-3 p-0">
                                                            <div class="menu-price pe-3">
                                                                <b style="font-weight: bolder">Ksh.{{$menu_item->price}}</b>
                                                            </div>
                                                            <div class="menu-button" style="box-sizing: border-box">
                                                                <button
                                                                    class="btn btn-primary btn-sm btn-cart menu_buy_item"
                                                                    data-id="{{ $menu_item->id }}"
                                                                    data-cart-control="load-item" data-menu-id="1"
                                                                    data-quantity="3" style="cursor:pointer;">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="layout-scrollable w-100">
                                                        <div class="d-flex align-items-center py-2 allergens">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination-bar text-right">
                                    <div class="links"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="affix-cart d-none d-lg-block">
                        <div class="card">
                            <div class="card-body">
                                <div data-control="cart-box">
                                    <div id="cart-box" class="module-box">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="cart_item">
                                                    <!-- Add more rows for other products -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="cart-coupon">
                                            <form id="coupon-form" method="POST" role="form"
                                                  data-request="cartBox::onApplyCoupon">
                                                <div class="cart-coupon">
                                                    <div class="input-group mt-2">
                                                        <input type="text" name="code" class="form-control" value=""
                                                               placeholder="Enter coupon code">
                                                        <button type="submit" class="btn btn-primary"
                                                                data-replace-loading="fa fa-spinner fa-spin"
                                                                title="Apply Coupon"><i class="fa fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                            <td class="text-right" id="sub_total">
                                                            </td>
                                                        </tr>
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
                                                            <td class="text-right" id="grand_total">
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="cart-buttons" class="mt-3">
                                            <button class="checkout-btn btn btn-primary btn-block btn-lg">Checkout · Ksh. <span id="checkout"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
