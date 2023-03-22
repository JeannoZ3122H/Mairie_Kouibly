@extends('layouts.front_master')

@section('content')

    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">La municipalité</h1>
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
                        <li class="trail-item trail-end"><span>La municipalité</span></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG 2 PART START ======-->

    <section class="blog-2-area pb-100 pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($municipalite))
                    @foreach ($municipalite as $item)
                        <div class="col-lg-2 col-md-7 col-sm-9">
                            <div class="blog-item mt-30 mb-30">
                                <div class="blog-thumb m-3">
                                    <img src="{{ $item->image }}" alt="blog">
                                </div>
                                <div class="blog-content text-center">
                                    <a href="#"><h3 class="title">{{ $item->full_name }}</h3></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif                
            </div>
        </div>
    </section>

@endsection