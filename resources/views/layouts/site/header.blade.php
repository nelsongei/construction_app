<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content=""/>
    <meta name="keywords" content="bootstrap, bootstrap5"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/site/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/controls.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>@yield('title','Construction Management System')</title>
</head>
<body>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="{{url('/')}}" class="logo m-0 float-start">CMS</a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li class="has-children">
                        <a href="#">Categories</a>
                        <ul class="dropdown">
                            @foreach($categories as $category)
                                <li><a href="{{url('/')}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('cart_items')}}">Cart</a></li>
                    <li><a href="{{url('/registration')}}">Register</a></li>
                </ul>
                <a href="#"
                   class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                   data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </div>
</nav>
