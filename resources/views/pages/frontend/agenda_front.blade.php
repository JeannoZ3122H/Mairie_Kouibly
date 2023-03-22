@extends('layouts.front_master')

@section('content')

    <section class="page-title-area" data-background="{{ asset('assets/media_fronan/fronan_img.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Agenda</h1>
                    </div>
                </div>
            </div>
        </div>  
    </section>

    <section class="service-details pt-120 pb-60">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-12 col-md-12">
                    <div class="service-details-main mb-60">
                        <div class="service-features mb-60">
                            <h4>Agenda</h4>
                            <div class="service-feature-list">
                                @if (isset($agendas))
                                    @foreach ($agendas as $items)
                                        <span> 
                                            <i class="fa fa-calendar-check" aria-hidden="true"></i>

                                            {{ $items->date. " : "."  " .$items->titre }} 
                                        </span>
                                    @endforeach                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
            