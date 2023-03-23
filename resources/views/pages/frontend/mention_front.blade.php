@extends('layouts.front_master')


@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-wrapper">
                    <h1 class="page-title mb-10">MENTIONS LEGALES</h1>
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
                    <li class="trail-item trail-end"><span>Mentions légales</span></li>
                    </ul>
                </nav>
            </div>
        </div>
        </div>
    </section>
    <!-- page title area end  -->

    <section class="blog-area pt-120 pb-60">
        <div class="container">
        <div class="row wow fadeInUp" data-wow-delay=".3s">
            @if (isset($mentions))
                @foreach ($mentions as $items)
                    <div class="col-xl-12 col-lg-8 col-md-12">
                        <div class="blog-details-wrapper mb-60">
                            <div class="blog-single-details">
                                <h3>{{ $items->titre }}</h3>
        
                                <p class="mb-55">{!! $items->description !!}</p>
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