@extends('layouts.front_master')

@section('content')

    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Détails découverte</h1>
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
                        <li class="trail-item trail-end"><span>Détails découverte</span></li>
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
                @if (isset($details_decouverte))
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-7 col-sm-9">
                            <div class="blog-item mt-30 mb-30">
                                <div class="blog-thumb">
                                    <img src="{{ $details_decouverte->image }}" alt="blog">
                                </div>
                                <div class="blog-content">
                                    <a href="#"><h3 class="title">{{ $details_decouverte->titre }}</h3></a>
                                    <p>{!! $details_decouverte->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif               
            </div>
        </div>
    </section>
@endsection