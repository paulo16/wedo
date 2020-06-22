<!DOCTYPE html>
<html lang="fr">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        @yield('head')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('assets/plugins/css/plugins.css')}}"  rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/styles.css') }}"  rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div id="main-wrapper">

            @include('frontend.layouts.pages.topbar')
            <div class="clearfix"></div>
            @yield('banner')
            <div class="clearfix"></div>
            @yield('content1')
            <div class="clearfix"></div>

            @yield('content2')
            <div class="clearfix"></div>
            @include('frontend.layouts.footer')
            <!-- Sign Up Window Code -->
            @include('frontend.people.login_register')

        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ asset('assets/plugins/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/aos.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/jquery-rating.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/slick.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/imagesloaded.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/isotope.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/bootstrap-slider.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/datedropper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/dropzone.js') }}"></script>

        <script src="{{ asset('assets/plugins/js/placeholders.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/timedropper.js') }}"></script>

        <script src="http://maps.google.com/maps/api/js?key="></script>
        <script src="{{ asset('assets/plugins/js/map_infobox.js') }}"></script>
        <script src="{{ asset('assets/plugins/js/markerclusterer.js') }}"></script>
        <script src="{{ asset('assets/js/custom-maps.js') }}"></script>

        <!-- Custom js -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->

    </body>

</html>