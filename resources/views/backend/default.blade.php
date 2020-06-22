<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('head')
        <link href="{{asset('assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/dropify/dropify.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/css/plugins.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    </head>

    <body>
        <div id="main-wrapper">
            @include('backend.layouts.topbar')
            <div class="clearfix"></div>
            <!-- =========================== Features Start ============================================ -->
            <section class="gray " style="padding-top:73px;padding-bottom:0px">
                <div class="container-fluid">

                    <div class="row">
                        @include('backend.layouts.sidebar')
                        <div class="tab-content dashboard-wrap">
                            @yield('content')
                        </div>
                    </div>

                </div>
            </section>

            <!-- =========================== Dashboard End ============================================ -->

            <!-- ============================ Footer Start ================================== -->
            @include('backend.layouts.footer')

        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ asset('assets/plugins/js/jquery.min.js')}}"></script>

        <script src="{{ asset('assets/plugins/js/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/jquery.fancybox.min.js')}}"></script>

        <script src="{{ asset('assets/plugins/js/aos.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/popper.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/jquery-rating.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/slick.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/imagesloaded.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/isotope.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/select2.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/bootstrap-slider.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/datedropper.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/dropzone.js')}}"></script>
        <!-- Datatables-->
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('assets/plugins/dropify/dropify.min.js')}}"></script>

        @yield('js')
        <script src="{{ asset('assets/plugins/js/placeholders.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/timedropper.js')}}"></script>

        <script src="http://maps.google.com/maps/api/js?key="></script>
        <script src="{{ asset('assets/plugins/js/map_infobox.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/markerclusterer.js')}}"></script>
        <script src="{{ asset('assets/js/custom-maps.js')}}"></script>

        <!-- Morris.js chart
        <script src="{{ asset('assets/plugins/js/raphael/raphael.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/js/morris.js/morris.min.js')}}"></script>
        <script src="{{ asset('assets/js/dashboard.js')}}"></script>
        -->
        <!-- Custom js -->
        <script src="{{ asset('assets/js/custom.js')}}"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <script type="text/javascript">

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong happended.'
    }
});

$(function () {
    $(".heading-compose").click(function () {
        $(".side-two").css({
            "left": "0"
        });
    });

    $(".newMessage-back").click(function () {
        $(".side-two").css({
            "left": "-100%"
        });
    });
});

        </script>

    </body>

</html>