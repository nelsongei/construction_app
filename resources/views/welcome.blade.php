@extends('layouts.site.main')
@section('content')
    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('assets/site/images/hero_bg_3.jpg')"></div>
            <div class="img overlay" style="background-image: url('assets/site/images/hero_bg_2.jpg')"></div>
            <div class="img overlay" style="background-image: url('assets/site/images/hero_bg_1.jpg')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="heading" data-aos="fade-up">Easiest way to find your dream home</h1>
                    <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                          data-aos-delay="200">
                        <input type="text" class="form-control px-4" placeholder="Your ZIP code or City. e.g. New York">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">Products</h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p><a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">View all products</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">
                            @forelse($products as $product)
                                <div class="property-item">
                                    <div class="card" style="width: 25rem;">
                                        <img src="{{asset('').'storage/'.$product->image}}" alt="Image"
                                             class="img-fluid">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">
                                                {{ \Illuminate\Support\Str::limit($product->description, 60, '....') }}
                                            </p>
                                            <span class="badge bg-secondary"
                                                  style="float: right">{{ $product->price }}</span>
                                        </div>
                                        <div class="card-body bg-white justify-content-center">
                                            <a href="javascript:void(0)"
                                               class="btn btn-primary py-2 px-3 menu_buy_item"
                                               data-id="{{ $product->id }}">Buy Now</a>
                                            <a href="{{url('/products/view/'.$product->id)}}"
                                               class="btn btn-primary py-2 px-3">See details</a>
                                        </div>
                                    </div>
                                </div> <!-- .item -->
                            @empty
                                <div class="property-item">
                                    <div class="card text-center">
                                        <p>No Products </p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <span class="flaticon-house"></span>
                        <h3 class="mb-3">Our Properties</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Property for Sale</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Real Estate Agent</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                        <span class="flaticon-house-1"></span>
                        <h3 class="mb-3">House for Sale</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section section-5 bg-light">
        <div class="container">
            <div class="row justify-content-center  text-center mb-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">Our Vendors</h2>
                    <p class="text-black-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam enim
                        pariatur
                        similique debitis vel nisi qui reprehenderit totam? Quod maiores.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">

                        <img src="{{asset('assets/site/images/person_1-min.jpg')}}" alt="Image"
                             class="img-fluid">

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">James Doe</a></h2>
                            <span class="meta d-block mb-3">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere officiis inventore cumque
                                tenetur laboriosam, minus culpa doloremque odio, neque molestias?</p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{asset('assets/site/images/person_2-min.jpg')}}" alt="Image"
                             class="img-fluid">

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Jean Smith</a></h2>
                            <span class="meta d-block mb-3">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere officiis inventore cumque
                                tenetur laboriosam, minus culpa doloremque odio, neque molestias?</p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">

                        <img src="{{asset('assets/site/images/person_3-min.jpg')}}" alt="Image"
                             class="img-fluid">

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Alicia Huston</a></h2>
                            <span class="meta d-block mb-3">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere officiis inventore cumque
                                tenetur laboriosam, minus culpa doloremque odio, neque molestias?</p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

