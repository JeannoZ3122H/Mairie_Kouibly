@extends('layouts.front_master')

@section('content')

<section class="page-title-area" style=" background-image: url('{{ asset('front/img/municipalite.jpg')}}') ">
    {{-- <div class="container">
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
    </div> --}}
</section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG 2 PART START ======-->

    <section class="blog-2-area pb-100 pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($municipalite))
                    @foreach ($municipalite as $item)
                    <div class=" card-body justify-content-center"  style="width: 20rem;">
                        <img src="{{ $item->image }}"  style="height: 200px; width:200px; border-radius: 20px; " class="card-img-top justify-content-center" alt="...">
                        <div class="card-body">
                            <a href="#"><h3 class="title">{{ $item->full_name }}</h3></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                        {{-- <div class="col-lg-2 col-md-7 col-sm-9">
                            <div class="blog-item mt-30 mb-30">
                                <div class="blog-thumb m-3">
                                    <img src="{{ $item->image }}" alt="blog">
                                </div>
                                <div class="blog-content text-center">
                                    <a href="#"><h3 class="title">{{ $item->full_name }}</h3></a>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
