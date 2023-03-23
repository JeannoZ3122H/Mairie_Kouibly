

@extends('layouts.front_master')

@section('style')
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@section('content')
    <section class="shop-page-area pt-40 pb-100">      
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    
                        @if (isset($documents_info))
                            <h2>{{ $documents_info->name }}</h2>
                        @endif
                    
                </div>
            </div>
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card p-2 ">
                        <h2>Infos Utiles</h2>
                        @if (isset($data_info))

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nom complet:  <strong>{{$data_info->full_name}}</strong> </li>
                                <li class="list-group-item">Numéro de l'extrait:  <strong>{{$data_info->num_extrait}}</strong> </li>
                                <li class="list-group-item">Email du demandeur:   <strong>{{$data_info->email_demandeur}}</strong> </li>
                                <li class="list-group-item">Numéro du demandeur:    <strong>{{$data_info->num_demandeur}}</strong></li>
                                <li class="list-group-item">Nombre de copie:    <strong>{{$data_info->nbre_copie}}</strong></li>
                                
                                <li class="list-group-item">Montant du timbre:     <strong>{{$data_info->montant_timbre}}</strong></li>

                                <li class="list-group-item">Lieu de livraison:    <strong>{{$data_info->lieu_livraison}}</strong></li>
                                <li class="list-group-item">Adresse de livraison:    <strong>{{$data_info->adresse_livraison}}</strong></li>
                                <li class="list-group-item">Document:  
                                    @if(empty($data_info->extrait_file))
                                        {{ "Aucun document n'a été joint" }}
                                        @else
                                        {{ 'un document a été joint' }}
                                    @endif
                                </li>
                            </ul>

                            <div class="text-center mt-4 ">
                                        
                                <a href="{{ route('demande_documents_edit_extr',[$data_info->id,$documents_info->rfk]) }}" class="main-btn main-btn-2">Modifier</a>
                
                            </div>

                                
                        @endif                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card pt-20 pb-30">
                        <div class="card-header"><h2>Vue d'ensemble</h2> </div>
                        <div class="card-body">                            
                            @if (isset($data_info))
                                
                                <h2>Frais de timbre :  {{$data_info->montant_timbre ."  "}} FCFA</h2> <br>

                                <input type="hidden" id="montant_timbre"  value="{{$data_info->montant_timbre}}"> 

                                <h2>Frais de livraison :  {{$data_info->montant_livraison ." "}} FCFA</h2>

                                <input type="hidden" id="montant_livraison"  value="{{$data_info->montant_livraison}}"> 
                                <input type="hidden" id="description"  value="{{$documents_info->name}}"> 

                                <div class="text-center mt-4 mb-4">
                                    <a target="_blank" href="{{route('pay',[$documents_info->name,$data_info->montant_livraison,$data_info->montant_timbre])}}"   class="main-btn main-btn-2">Payer</a>
                                </div>
                                
                                <img src="{{ asset('assets/media_fronan/py.png') }}" alt="">                                
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

@endsection
