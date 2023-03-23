@extends('layouts.front_master')



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

                        @if (isset($data_info_cert_deces))
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nom complet du défunt:  <strong>{{$data_info_cert_deces->full_name}}</strong> </li>
                                <li class="list-group-item">Profession du défunt:  <strong>{{$data_info_cert_deces->profession_defunt}}</strong> </li>
                                <li class="list-group-item">Lieu de naissance:  <strong>{{$data_info_cert_deces->lieu_naissance}}</strong> </li>
                                <li class="list-group-item">Date du décès:  <strong>{{$data_info_cert_deces->date_deces}}</strong> </li>
                                <li class="list-group-item">Lieu du décès:  <strong>{{$data_info_cert_deces->lieu_deces}}</strong> </li>
                                <li class="list-group-item">Nom du père:  <strong>{{$data_info_cert_deces->name_pere}}</strong> </li>
                                <li class="list-group-item">Domicile du père:  <strong>{{$data_info_cert_deces->domicile_pere}}</strong> </li>
                                <li class="list-group-item">Nom de la mère:  <strong>{{$data_info_cert_deces->name_mere}}</strong> </li>
                                <li class="list-group-item">Domicile de la mère:  <strong>{{$data_info_cert_deces->domicile_mere}}</strong> </li>
                                <li class="list-group-item">Nom du déclarant:  <strong>{{$data_info_cert_deces->name_declarant}}</strong> </li>
                                <li class="list-group-item">Email du déclarant:   <strong>{{$data_info_cert_deces->email_declarant}}</strong> </li>
                                <li class="list-group-item">Numéro du déclarant:    <strong>{{$data_info_cert_deces->num_declarant}}</strong></li>
                                <li class="list-group-item">Nombre de copie:    <strong>{{$data_info_cert_deces->nbre_copie}}</strong></li>                                
                                <li class="list-group-item">Montant du timbre:     <strong>{{$data_info_cert_deces->montant_timbre}}</strong></li>
                                <li class="list-group-item">Lieu de livraison:    <strong>{{$data_info_cert_deces->lieu_livraison}}</strong></li>
                                <li class="list-group-item">Adresse de livraison:    <strong>{{$data_info_cert_deces->adresse_livraison}}</strong></li>
                                <li class="list-group-item">Document: 
                                    @if(empty($data_info_cert_deces->extrait_file))
                                        {{ "Aucun document n'a été joint" }}
                                        @else
                                        {{ 'un document a été joint' }}
                                    @endif
                                </li>
                            </ul>

                            <div class="text-center mt-4 ">                                       
                                <a href="{{ route('demande_documents_edit_deces',[$data_info_cert_deces->id,$documents_info->rfk]) }}" class="main-btn main-btn-2">Modifier</a>                
                            </div>                                
                        @endif                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card pt-20 pb-30">
                        <div class="card-header"><h2>Vue d'ensemble</h2> </div>
                        <div class="card-body">                            
                            @if (isset($data_info_cert_deces))                                
                                <h2>Frais de timbre :  {{$data_info_cert_deces->montant_timbre ."  "}} FCFA</h2> <br>

                                <input type="hidden" id="montant_timbre"  value="{{$data_info_cert_deces->montant_timbre}}"> 

                                <h2>Frais de livraison :  {{$data_info_cert_deces->montant_livraison ." "}} FCFA</h2>

                                <input type="hidden" id="montant_livraison"  value="{{$data_info_cert_deces->montant_livraison}}"> 
                                <input type="hidden" id="description"  value="{{$documents_info->name}}"> 

                                <div class="text-center mt-4 mb-4">
                                    <a target="_blank" href="{{route('pay',[$documents_info->name,$data_info_cert_deces->montant_livraison,$data_info_cert_deces->montant_timbre])}}"   class="main-btn main-btn-2">Payer</a>
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
