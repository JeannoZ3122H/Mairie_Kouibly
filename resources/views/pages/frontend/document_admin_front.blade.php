@extends('layouts.front_master')


@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container">
            <div class="section-title text-center">
                <h5 class="title">
                    Documents Administratifs
                </h5>
                
            </div>
            <div class="row justify-content-center">
                @if (isset($liste_documents))                                           
                    @foreach ($liste_documents as $liste_doc )
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="store-item text-center bg-white mt-30">
                                <a href="{{ route('demande_documents', $liste_doc->rfk) }}">
                                    <img src="{{ asset('assets/media_fronan/document.png') }}" alt="store">
                                </a>
                                <div class="store-title d-flex justify-content-between align-items-center">
        
                                    <a href="{{ route('demande_documents', $liste_doc->rfk) }}">
                                        <h5 class="title text-37">{{ $liste_doc->name }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif                
            </div>
        </div>
    </section>
@endsection
