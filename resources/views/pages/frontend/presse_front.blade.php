@extends('layouts.front_master')

@section('content')

    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Presses</h1>
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
                        <li class="trail-item trail-end"><span>Presses</span></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area pt-120 pb-75">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                    <span class="section-subtitle"></span>
                    <h2 class="section-main-title mb-45">Presses</h2>
                    </div>
                </div>
            </div>
            <div class="blog-wrapper wow fadeInUp" data-wow-delay=".3s">
                <div class="row">
                    @if (isset($presse))
                        @foreach ($presse as $items)
                            <div class="col-lg-4 col-md-6">
                                <div class="blog-single blog-general mb-45">
                                    <div class="blog-thumb">
                                        <a href="{{ $items->url_presse }}" target="_blank"><img src="{{ $items->image }}" alt=""></a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta-list">
                                            <div class="blog-meta-single">
                                                <div class="blog-meta-text">
                                                    <div class="blog-date">{{date("d-m-Y H:i", strtotime($items->created_at))  }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="blog-title"><a href="{{ $items->url_presse }}" target="_blank">{{ $items->titre }}</a></h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif                
                </div>
            </div>
        </div>
    </section>
@endsection