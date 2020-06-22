  
@extends('frontend.layouts.pages.default')

@section('head')
<title>wedo | Contact</title>
@endsection

@section('banner')
<div class="page-title image-title" style="background-image:url('assets/img/banner-4.jpg');">
    <div class="finding-overlay op-70"></div>
    <div class="container">
        <div class="page-title-wrap">
            <h1>Get in touch</h1>
            <p><a href="#" class="theme-cl">Home</a> <span class="current-page active">Contact Us</span></p>
        </div>
    </div>
</div>
@endsection

@section('content1')
<section>
    <div class="container">

        <div class="row mt-5 align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="contact-box">
                    <i class="ti-email"></i>
                    <h4>Drop a Mail</h4>
                    virasat@gmail.com<br>
                    my.virasat@gmail.com
                </div>
                <div class="contact-box">
                    <i class="ti-headphone"></i>
                    <h4>Call Us</h4>
                    91+ 123 456 9857<br>
                    91+ 258 548 5426
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="contact-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="email" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" placeholder="Type Here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Request</button>
                    </form>
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