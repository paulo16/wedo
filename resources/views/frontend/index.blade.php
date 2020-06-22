  
@extends('frontend.layouts.home.default')

@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{asset('assets/img/favicon_1.ico')}}">
<title>wedo | Accueil</title>
@endsection

@section('banner')
<section class="single-banner" style="background-image:url('assets/media/header.jpg');">
    <div class="finding-overlay op-80"></div>
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="caption text-center text-white">
                        <h2>Sit back, we'll take it from here</h2>
                        <p>Book or get free quotes for over 25 home services from trusted companies in Morroco</p>
                    </div>
                </div>
            </div>
            <form>
                <fieldset class="home-form-1">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <select id="category" class="js-states form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="1">Moving & Storage</option>
                                    <option value="2">Cleaning Services </option>
                                    <option value="3">Painting & Handyman</option>
                                    <option value="4">Sport & Gym</option>
                                    <option value="5">Garden & Pest Control </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control b-r" placeholder="Where...">
                                <i class="ti-target"></i>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <button type="submit" class="btn theme-btn seub-btn b-0">FIND</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <ul class="banner-cat-list">
                        <li><a href=""><i class="ti-filter"></i><span>Restaurant</span></a></li>
                        <li><a href=""><i class="ti-map-alt"></i><span>Travel</span></a></li>
                        <li><a href=""><i class="ti-briefcase"></i><span>Business</span></a></li>
                        <li><a href=""><i class="ti-support"></i><span>Medical</span></a></li>
                        <li><a href=""><i class="ti-files"></i><span>Documentry</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content1')
<section>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="sec-heading mx-auto">
                    <h2>What we do</h2>
                    <p>
                        Wedo Service allows you to quickly and easily find the best companies in  Morocco for anything you need around the home.

                        Whether you are looking for multiple quotes for an international move or have an urgent cleaning request, our goal is to improve customer experience by reducing the time spent researching different companies and comparing their prices.
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="sec-heading mx-auto">
                    <h2>Why Wedo Service? </h2>
                    <p>We are the largest home services marketplace in the North Africa. Thousands of people trust us with their homes every month.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="features-icon-center">
                    <div class="features-icon-center-item">
                        <div class="features-icon-center-box"><i class="ti-map-alt"></i></div>
                        <div class="features-icon-center-content">
                            <h4>Everything your home needs</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="features-icon-center">
                    <div class="features-icon-center-item">
                        <div class="features-icon-center-box"><i class="ti-email"></i></div>
                        <div class="features-icon-center-content">
                            <h4>The best professionals for your job</h4>
                            <p>We measure and manage our service partners on their service quality to make sure our service is great</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="features-icon-center">
                    <div class="features-icon-center-item">
                        <div class="features-icon-center-box"><i class="ti-user"></i></div>
                        <div class="features-icon-center-content">
                            <h4>Great customer service</h4>
                            <p>We take customer service seriously. Our contact center is open 7 days per week to help you out with anything you need</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('conten2')
<section class="gray">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="sec-heading mx-auto">
                    <h2>Are you interested in?</h2>
                    <p>Explore curated lists of top restaurants, cafes & shopping around the world by categories.</p>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-lg-4 col-sm-6 ">
                <div class=" category-box-wrap">
                    <div class="category-box-header">
                        <img src="{{ asset('assets/media/5-3.jpg') }}"  class="img-responsive" alt="">
                    </div>
                    <div class="category-box-body">
                        <div class="category-box-thumb">
                            <a href="category-list.html" class="category-icon-box cbg-1"><i class="fa fa-briefcase"></i></a>
                        </div>
                        <div class="category-box-caption">
                            <h4 class="category-title"><a href="category-list.html">Moving & Storage </a></h4>
                            <span class="category-counting">203 Listing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="category-box-wrap">
                    <div class="category-box-header">
                        <img src="{{ asset('assets/media/office-cleaning.jpg') }}"  class="img-responsive" alt="">
                    </div>
                    <div class="category-box-body">
                        <div class="category-box-thumb">
                            <a href="category-list.html" class="category-icon-box cbg-2"><i class="fa fa-paint-brush"></i></a>
                        </div>
                        <div class="category-box-caption">
                            <h4 class="category-title"><a href="category-list.html">Cleaning Services</a></h4>
                            <span class="category-counting">95 Listing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="category-box-wrap">
                    <div class="category-box-header">
                        <img src="{{ asset('assets/media/plumbing.jpg') }}"  class="img-responsive" alt="">
                    </div>
                    <div class="category-box-body">
                        <div class="category-box-thumb">
                            <a href="category-list.html" class="category-icon-box cbg-3"><i class="fa fa-graduation-cap"></i></a>
                        </div>
                        <div class="category-box-caption">
                            <h4 class="category-title"><a href="category-list.html">Painting & Handyman</a></h4>
                            <span class="category-counting">25 Listing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="category-box-wrap">
                    <div class="category-box-header">
                        <img src="{{ asset('assets/media/8.jpg') }}"  class="img-responsive" alt="">
                    </div>
                    <div class="category-box-body">
                        <div class="category-box-thumb">
                            <a href="category-list.html" class="category-icon-box cbg-4"><i class="fa fa-glass"></i></a>
                        </div>
                        <div class="category-box-caption">
                            <h4 class="category-title"><a href="category-list.html">Garden & Pest Control</a></h4>
                            <span class="category-counting">85 Listing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="category-box-wrap">
                    <div class="category-box-header">
                        <img src="{{ asset('assets/media/catering-1.jpg') }}"  class="img-responsive" alt="">
                    </div>
                    <div class="category-box-body">
                        <div class="category-box-thumb">
                            <a href="category-list.html" class="category-icon-box cbg-5"><i class="fa fa-heart"></i></a>
                        </div>
                        <div class="category-box-caption">
                            <h4 class="category-title"><a href="category-list.html">Events & Catering </a></h4>
                            <span class="category-counting">122 Listing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="category-box-wrap">
                    <div class="category-box-header">
                        <img src="{{ asset('assets/media/car-insurance-1.jpg') }}"  class="img-responsive" alt="">
                    </div>
                    <div class="category-box-body">
                        <div class="category-box-thumb">
                            <a href="category-list.html" class="category-icon-box cbg-6"><i class="fa fa-futbol-o"></i></a>
                        </div>
                        <div class="category-box-caption">
                            <h4 class="category-title"><a href="category-list.html">Insurance </a></h4>
                            <span class="category-counting">203 Listing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content3')
<section class="cta center-bg" style="background:#ff7600 url('assets/img/tag-1.png')no-repeat">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="cta-sec text-center">
                    <h2>Sign up for 30 days trial!</h2>
                    <p>No payment required, jump to get started.</p>
                    <a href="index.html" class="btn btn-cta">Free Register!</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content4')
<section class="lst">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="sec-heading mx-auto">
                    <h2>Most Popular Service</h2>
                    <p>Explore most popular Service </p>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="owl-carousel" id="destination-slide">
                <div class="destination-list">
                    <div class="destination-list-thumb">
                        <a href="#"><img src="{{ asset('assets/media/photography-1.jpg') }}"  class="img-fluid mx-auto" alt=""></a>
                    </div>
                    <div class="destination-list-caption">
                        <h5 class="destination-title"><a href="#">Photography</a></h5>

                    </div>
                </div>
                <div class="destination-list">
                    <div class="destination-list-thumb">
                        <a href="#"><img src="{{ asset('assets/media/painting2-1.jpg') }}"  class="img-fluid mx-auto" alt=""></a>
                    </div>
                    <div class="destination-list-caption">
                        <h5 class="destination-title"><a href="#">Painting</a></h5>

                    </div>
                </div>
                <div class="destination-list">
                    <div class="destination-list-thumb">
                        <a href="#"><img src="{{ asset('assets/media/ac-cleaning.jpg') }}"  class="img-fluid mx-auto" alt=""></a>
                    </div>
                    <div class="destination-list-caption">
                        <h5 class="destination-title"><a href="#">Ac Cleaning</a></h5>

                    </div>
                </div>
                <div class="destination-list">
                    <div class="destination-list-thumb">
                        <a href="#"><img src="{{ asset('assets/media/electrician-1.jpg')}}" class="img-fluid mx-auto" alt=""></a>
                    </div>
                    <div class="destination-list-caption">
                        <h5 class="destination-title"><a href="#">Electrician</a></h5>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content5')
<section class="testimonials-3 center-bg" style="background:#ff7600 url('assets/img/icon-bg.png')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10">
                <div id="testimonial-3" class="slick-carousel-3">
                    <div class="testimonial-detail">
                        <div class="client-detail-box">
                            <div class="pic">
                                <img src="{{ asset('assets/img/team-1.png')}}"  alt="">
                            </div>
                            <div class="client-detail">
                                <h3 class="testimonial-title">Adam Alloriam</h3>
                                <span class="post">Web Developer</span>
                            </div>
                        </div>
                        <p class="description">
                            Excellent service in handling and packing furniture. Storage conditions are good and separated in an appropriate cubicle.
                        </p>
                    </div>
                    <div class="testimonial-detail">
                        <div class="client-detail-box">
                            <div class="pic">
                                <img src="{{ asset('img/team-2.png')}}" alt="">
                            </div>
                            <div class="client-detail">
                                <h3 class="testimonial-title">Illa Millia</h3>
                                <span class="post">Project Manager</span>
                            </div>
                        </div>

                        <p class="description">
                            I would like to appreciate Al Tilal movers as they came exactly in the requested time.
                            They were really professional, fast ....
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content6')
<section class="lst">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="sec-heading mx-auto">
                    <h2>Mon Blog</h2>
                    <p>Discover some of the most popular article </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Event -->
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                <div class="event-grid-wrap">
                    <a href="#">
                        <div class="event-grid-header">
                            <img src="{{ asset('assets/img/event-1.jpg') }}"class="img-fluid mx-auto" alt="">
                            <span class="event-grid-cat">Sport &amp; Football</span>
                        </div>
                    </a>
                    <div class="event-grid-caption">
                        <div class="event-grid-caption-header">
                            <h4 class="event-name"><a href="#">Amagansett Go Around</a></h4>
                            <div class="event-social-info">
                                <a href="#"><i class="ti-share"></i></a>
                                <a href="#"><i class="ti-bookmark-alt"></i></a>
                            </div>
                        </div>
                        <span class="event-time-limit">9 Feb 10:30Am</span>
                        <p><i class="ti-location-pin"></i>215 Uzil Cansa</p>
                    </div>
                </div>
            </div>
            <!-- Single Event -->
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                <div class="event-grid-wrap">
                    <a href="#">
                        <div class="event-grid-header">
                            <img src="{{ asset('img/event-2.jpg') }}" class="img-fluid mx-auto" alt="">
                            <span class="event-grid-cat">Part &amp; bar</span>
                        </div>
                    </a>
                    <div class="event-grid-caption">
                        <div class="event-grid-caption-header">
                            <h4 class="event-name"><a href="#">Amateur Barber Night</a></h4>
                            <div class="event-social-info">
                                <a href="#"><i class="ti-share"></i></a>
                                <a href="#"><i class="ti-bookmark-alt"></i></a>
                            </div>
                        </div>
                        <span class="event-time-limit">15 Feb 09:30Am</span>
                        <p><i class="ti-location-pin"></i>215 Uzil Cansa, </p>
                    </div>
                </div>
            </div>
            <!-- Single Event -->
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                <div class="event-grid-wrap">
                    <a href="#">
                        <div class="event-grid-header">
                            <img src="{{ asset('img/event-3.jpg') }}" class="img-fluid mx-auto" alt="">
                            <span class="event-grid-cat">Social Network</span>
                        </div>
                    </a>
                    <div class="event-grid-caption">
                        <div class="event-grid-caption-header">
                            <h4 class="event-name"><a href="#">Antisocial Darwinism</a></h4>
                            <div class="event-social-info">
                                <a href="#"><i class="ti-share"></i></a>
                                <a href="#"><i class="ti-bookmark-alt"></i></a>
                            </div>
                        </div>
                        <span class="event-time-limit">10 March 10:40Am</span>
                        <p><i class="ti-location-pin"></i>841 Uzil Kilowar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection