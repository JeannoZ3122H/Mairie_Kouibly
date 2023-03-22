@extends('layouts.front_master')

@section('content')

    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Financier</h1>
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
                        <li class="trail-item trail-end"><span>Financier</span></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="about-info-area pt-130 pb-130">
        <div class="container">
            @if ($financier)
                
                @foreach ($financier as $items)
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-info-thumb ml-30 mr-30">
                                <img src="{{ $items->image }}" alt="about">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-info-content">
                                <span class="about-info-content-span">Financier</span>
                                <h3 class="title">{{ $items->responsable }}</h3>
                                <p>
                                    {!! $items->description !!}
                                </p>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    

@endsection