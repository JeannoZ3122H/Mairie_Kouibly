@extends('layouts.front_master')

@section('content')

    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Détails actualités</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="breadcrumb-menu">
                    <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items">
                        <li class="trail-item trail-begin"><a href="{{ route('front') }}"><span>Accueil</span></a></li>
                        <li class="trail-item trail-end"><span>Détails actualités</span></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->

    <!--====== CONTACT MASSAGE PART START ======-->

    <section class="contact-massage-area pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($show_details))
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-7 col-sm-9">
                            <div class="blog-item mt-30 mb-30">
                                <div class="blog-thumb">
                                    <img src="{{ $show_details->image }}" alt="blog">
                                </div>
                                <div class="blog-content">
                                    <a href="#"><h3 class="title">{{ $show_details->titre }}</h3></a>
                                    <p>{!! $show_details->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif               
            </div>
        </div>
    </section>
@endsection