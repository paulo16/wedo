  
@extends('frontend.layouts.pages.default')

@section('head')
<title>wedo | all-services</title>
@endsection

@section('banner')
<section>
    <div class="page-title">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="pt-caption text-center mt-5">
                    <h1>Les Types de services</h1>
                    <p><a href="{{route('home')}}">Home</a><span class="current-page">All Category</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content1')
<div class="container">

    <div class="row">

        <!-- Single Category -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="modern-category">
                <div class="modern-category-box-thumb">
                    <a href="all-listing.html"><img src="assets/media/5-3.jpg" class="img-fluid mx-auto" alt=""></a>
                </div>
                <div class="modern-category-footer">
                    <div class="mc-footer-caption">
                        <h4 class="category-title"><a href="all-listing.html">Moving & Storage</a></h4>
                        <span class="category-counting">203 Listing</span>
                    </div>
                    <a href="all-listing.html" class="mc-footer-link"><i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Single Category -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="modern-category">
                <div class="modern-category-box-thumb">
                    <a href="all-listing.html"><img src="assets/media/office-cleaning.jpg" class="img-fluid mx-auto" alt=""></a>
                </div>
                <div class="modern-category-footer">
                    <div class="mc-footer-caption">
                        <h4 class="category-title"><a href="all-listing.html">Cleaning Services</a></h4>
                        <span class="category-counting">203 Listing</span>
                    </div>
                    <a href="all-listing.html" class="mc-footer-link"><i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Single Category -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="modern-category">
                <div class="modern-category-box-thumb">
                    <a href="all-listing.html"><img src="assets/media/plumbing.jpg" class="img-fluid mx-auto" alt=""></a>
                </div>
                <div class="modern-category-footer">
                    <div class="mc-footer-caption">
                        <h4 class="category-title"><a href="all-listing.html">Painting & Handyman</a></h4>
                        <span class="category-counting">203 Listing</span>
                    </div>
                    <a href="all-listing.html" class="mc-footer-link"><i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="modern-category">
                <div class="modern-category-box-thumb">
                    <a href="all-listing.html"><img src="assets/media/8.jpg" class="img-fluid mx-auto" alt=""></a>
                </div>
                <div class="modern-category-footer">
                    <div class="mc-footer-caption">
                        <h4 class="category-title"><a href="all-listing.html">Garden & Pest Control</a></h4>
                        <span class="category-counting">203 Listing</span>
                    </div>
                    <a href="all-listing.html" class="mc-footer-link"><i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="modern-category">
                <div class="modern-category-box-thumb">
                    <a href="all-listing.html"><img src="assets/media/catering-1.jpg" class="img-fluid mx-auto" alt=""></a>
                </div>
                <div class="modern-category-footer">
                    <div class="mc-footer-caption">
                        <h4 class="category-title"><a href="all-listing.html">Events & Catering</a></h4>
                        <span class="category-counting">203 Listing</span>
                    </div>
                    <a href="all-listing.html" class="mc-footer-link"><i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="modern-category">
                <div class="modern-category-box-thumb">
                    <a href="all-listing.html"><img src="assets/media/car-insurance-1.jpg" class="img-fluid mx-auto" alt=""></a>
                </div>
                <div class="modern-category-footer">
                    <div class="mc-footer-caption">
                        <h4 class="category-title"><a href="all-listing.html">Insurance</a></h4>
                        <span class="category-counting">203 Listing</span>
                    </div>
                    <a href="all-listing.html" class="mc-footer-link"><i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

    </div>

</div>
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