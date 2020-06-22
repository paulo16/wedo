<!DOCTYPE html>
<html lang="fr">

    <head>
        @yield('head')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wedo Service</title>
        <link href="{{ asset('assets/plugins/css/plugins.css')}}"  rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/styles.css') }}"  rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div id="main-wrapper">
            <header class="topbar fixed-header header animated slideInDown landing ">
                @include('frontend.layouts.home.navbar')
            </header>
            @yield('banner')
            <!-- ============================ Hero Banner End ================================== -->
            @yield('content1')
            @yield('conten2')
            @yield('content3')
            @yield('content4')
            @yield('content5')
            @yield('content6')
            @include('frontend.layouts.footer')
            <!-- Sign Up Window Code -->

            @include('frontend.people.login_register')
        </div>
        <script src="{{ asset('assets/plugins/js/jquery.min.js') }}" ></script>
        <script src="{{ asset('assets/plugins/js/popper.min.js') }}" ></script>
        <script src="{{ asset('assets/plugins/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('assets/plugins/js/owl.carousel.min.js') }}" ></script>
        <script src="{{ asset('assets/plugins/js/slick.js') }}" ></script>
        <script src="{{ asset('assets/plugins/js/imagesloaded.js') }}" ></script>
        <script src="{{ asset('assets/plugins/js/select2.min.js') }}" ></script>
        <script src="{{ asset('assets/js/custom.js') }}" ></script>
    </body>

</html>