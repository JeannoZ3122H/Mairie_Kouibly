@extends('layouts.damin_master')


@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h5 class="">
                    Bienvenue : {{ "  ". Auth::user()->full_name }}
                </h5>
                <h5 class="title">
                    Espace Administration
                </h5>
                
            </div>
        </div>

        <div class="gallery-page-area pb-130">
            <div class="container">
                <div class="row grid">
                    @if (isset($liste_documents))
                        @foreach ($liste_documents as $liste_doc)
                            <div class="col-lg-4 col-sm-6 col-md-6 cat-1 cat-2 cat-4">
                                <div class="gallery-item mt-30 bg-white">
                                    <a href="{{ route('documents', $liste_doc->rfk) }}">
                                        <img src="{{ asset('assets/marieimg/document.png') }}" alt="gallery">
                                    </a>

                                    <br>
                                    <div class="store-title d-flex justify-content-center align-items-center">
                                        <a href="{{ route('documents', $liste_doc->rfk) }}">
                                            <h5 class="title text-37">{{ $liste_doc->name }}</h5>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="store-price d-flex justify-content-center align-items-center">
                                        <a href="{{ route('documents', $liste_doc->rfk) }}" class="main-btn">                                    
                                            @if (isset($all_documents))
                                                @foreach ($all_documents as $items)
                                                    @if ($items['name'] == $liste_doc->name)
                                                        <span>{{ $items['value'] }}</span>                                                    
                                                    @endif
                                                @endforeach
                                            @endif
                                        </a>                                    
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


