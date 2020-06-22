  
@extends('frontend.layouts.pages.default')

@section('head')
<title>wedo | A propos</title>
@endsection

@section('banner')
<div class="page-title image-title">
    <div class="finding-overlay op-70"></div>
    <div class="container">
        <div class="page-title-wrap">
            <h1>About us</h1>
            <p><a href="index.html" class="theme-cl">Home</a> <span class="current-page active">about Us</span></p>
        </div>
    </div>
</div>
@endsection

@section('content1')
<section>
    <div class="container">

        <div class="row mt-5 align-items-center">


            <div class="col-lg-7 col-md-7">
                <div class="sec-heading text-left">
                    <h2>What we do</h2>
                    <p>
                        Wedo Service allows you to quickly and easily find the best companies in Morocco for anything you need around the home.

                        Whether you are looking for multiple quotes for an international move or have an urgent cleaning request, our goal is to improve customer experience by reducing the time spent researching different companies and comparing their prices.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <img src="{{ asset('assets/media/header.jpg') }}" class="img-fluid mx-auto" alt="">
            </div>
        </div>

    </div>
    <div class="container mt-5">
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

@section('content2')
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