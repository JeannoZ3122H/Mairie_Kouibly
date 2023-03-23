@extends('layouts.front_master')

@section('content')

    <section class="page-title-area" style=" background-image: url('{{ asset('front/img/conseillers.jpg')}}') ">
        {{-- <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-wrapper">
                            <h1 class="page-title mb-10">Les conseillers</h1>
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
                            <li class="trail-item trail-end"><span>Les conseillers</span></li>
                        </ul>
                        </nav>
                    </div>
                </div>
            </div> --}}
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->
    <!--====== BLOG 2 PART START ======-->

    <section class="blog-2-area mt-100 pb-100 pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($conseillers))
                    @foreach ($conseillers as $item)

                    <div class="mt-100 mb-3" style="max-width: 540px;">
                        <div class="card-body row g-0">
                          <div class="col-md-4">
                            <img src="{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title"><a href="#"><h3 class="title">{{ $item->full_name }}</h3></a></h5>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia doloribus tempora eius quae exercitationem sint mollitia earum, eligendi fugiat rem veniam ut, dolore laborum repellendus nostrum. Necessitatibus ipsa fugit voluptatum.</p>
                              </div>
                          </div>
                        </div>
                      </div>
                        {{-- <div class="col-lg-2 col-md-12 col-sm-9">
                            <div class="row mt-30 mb-30">
                                <div class=" m-3 col-md-6">
                                    <img src="{{ $item->image }}" alt="blog">
                                </div>
                                <div class="blog-content text-center col-md-6">
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
