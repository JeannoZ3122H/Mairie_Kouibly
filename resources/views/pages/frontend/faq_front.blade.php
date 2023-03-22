@extends('layouts.front_master')


@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-wrapper">
                    <h1 class="page-title mb-10">FAQ</h1>

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
                    <li class="trail-item trail-end"><span>faq</span></li>
                    </ul>
                </nav>
            </div>
        </div>
        </div>
    </section>
    <!-- page title area end  -->

    <!-- faq area start  -->
    <div class="faq-area pt-120 pb-120">
        <div class="container">
        <div class="faq-wrapper wow fadeInUp" data-wow-delay=".3s">
            <div class="gm-faq gm-faq-2column">
                <div class="accordion" id="accordionExample">
                    @if (isset($faqs))
                        @foreach ($faqs as $items)
                            <div class="gm-faq-group">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{ "heading".$items->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="{{ "#collapse".$items->id }}" aria-expanded="false" aria-controls="{{ "collapse".$items->id }}">
                                            {{ $items->titre }}
                                        </button>
                                    </h2>
                                    <div id="{{ "collapse".$items->id }}" class="accordion-collapse collapse" aria-labelledby="{{ "heading".$items->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {!! $items->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
        </div>
    </div>
    <!-- faq area end  -->
@endsection