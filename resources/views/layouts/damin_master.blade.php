<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



    <head>

        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--====== Title ======-->
        <title>Mairie - Fronan</title>

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ asset('assets1/images/favicon.ico') }}" type="image/png">

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}">

        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/all.css') }}">

        <!--====== flaticon css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/flaticon.css') }}">

        <!--====== Line Icons css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/LineIcons.html') }}">

        <!--====== animate css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/animate.min.css') }}">

        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/magnific-popup.css') }}">

        <!--====== Slick css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/slick.css') }}">

        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/default.css') }}">

        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">



    </head>

    <body>

        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div>


        {{-- modal --}}

        @include('layouts.admin_template.modal')


        @include('layouts.admin_template.header')


        @yield('content')
        
    

        @include('layouts.admin_template.footer')



        <!--====== jquery js ======-->
        <script src="{{ asset('assets1/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets1/js/vendor/jquery-1.12.4.min.js') }}"></script>

        <!--====== Bootstrap js ======-->
        <script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets1/js/popper.min.js') }}"></script>

        <!--====== Slick js ======-->
        <script src="{{ asset('assets1/js/slick.min.js') }}"></script>

        <!--====== Isotope js ======-->
        <script src="{{ asset('assets1/js/isotope.pkgd.min.js') }}"></script>

        <!--====== Images Loaded js ======-->
        <script src="{{ asset('assets1/js/imagesloaded.pkgd.min.js') }}"></script>

        <!--====== counterup js ======-->
        <script src="{{ asset('assets1/js/jquery.counterup.min.js') }}"></script>

        <!--====== waypoints js ======-->
        <script src="{{ asset('assets1/js/waypoints.min.js') }}"></script>

        <!--====== Magnific Popup js ======-->
        <script src="{{ asset('assets1/js/jquery.magnific-popup.min.js') }}"></script>

        <!--====== Ajax Contact js ======-->

        <!--====== Main js ======-->
        <script src="{{ asset('assets1/js/main.js') }} "></script>

        <script src="{{ asset('assets1/js/app.js') }} "></script>

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


        @yield('scripts')

        @include('sweetalert::alert')

    </body>



</html>