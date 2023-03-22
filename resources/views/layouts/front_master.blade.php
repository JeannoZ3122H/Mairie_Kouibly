<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



   <!-- Mirrored from technext.github.io/Indsutrio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 15:09:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Mairie Logoualé</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('front/img/favicon.html') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="fonts.googleapis.com/index.html">
    <link rel="preconnect" href="fonts.gstatic.com/index.html" crossorigin>
    <link href="fonts.googleapis.com/css2ce42.css?family=Open+Sans:wght@400;500;600&amp;family=Rubik:wght@500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <link href="cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
</head>


    <body>
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div>

        @include('layouts.front_template.header')

        @include('layouts.front_template.modal')

        @yield('content')

        @include('layouts.front_template.footer')

        <!-- JavaScript Libraries -->
        <script src="{{ asset('front/code.jquery.com/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('front/cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('front/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/lib/counterup/counterup.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('front/js/main.js') }}"></script>

        @yield('scripts')

        @include('sweetalert::alert')
    </body>

</html>
