@extends('layouts.front_master')

@section('content')

    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Découvertes</h1>
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
                        <li class="trail-item trail-end"><span>Découvertes</span></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-area pt-120 pb-90 portfolio-bg fix">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-8">
                    <div class="section-title style-4 text-center">
                        <span class="section-subtitle">Découverte</span>
                        <h2 class="section-main-title mb-45">Site touristique</h2>
                    </div>
                </div>
            </div>

            <div class="portfolio-wrapper portfolio-hover-items-wrapper style-4 wow fadeInUp" data-wow-delay=".3s">
                <span class="portfolio-shape-1"></span>
                <i class="flaticon-gardening-1 portfolio-shape-2"></i>
                @if (isset($decouvertes))
                    @foreach ($decouvertes as $items)
                        <div class="portfolio-single portfolio-hover-style style-4">
                            <div class="portfolio-thumb">
                                <a href="{{ route('details_decouverte', $items->id) }}"><img src="{{ $items->image }}" alt=""></a>
                                <div class="portfolio-content">
                                <a href="{{ route('details_decouverte', $items->id) }}" class="portfolio-hover-bg"></a>
                                <div class="portfolio-inner">
                                    <div class="portfolio-inner-text">
                                        <h4 class="portfolio-title"><a href="{{ route('details_decouverte', $items->id) }}">{{ $items->titre }}</a></h4>
                                    </div>
                                    <a href="{{ route('details_decouverte', $items->id) }}" class="icon-btn image-popups"><i
                                        class="fas fa-eye"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif                            
            </div>
        </div>
    </section>
@endsection