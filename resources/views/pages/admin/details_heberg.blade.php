@extends('layouts.damin_master')

@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <div class="section-title">
                <h3 class="title">
                    Détails de demande de certificat d'hebergement
                </h3>                
            </div>

            @if ($data_info_cert_heberg)
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">NOM DU DEMANDEUR :   <strong>{{$data_info_cert_heberg->name_demandeur}}</strong> </li>
                            <li class="list-group-item">EMAIL DU DEMANDEUR :   <strong>{{$data_info_cert_heberg->email_demandeur}}</strong> </li>
                            <li class="list-group-item">NUMERO DU DEMANDEUR :   <strong>{{$data_info_cert_heberg->num_demandeur}}</strong> </li>
                            <li class="list-group-item">DOMICILE DU DEMANDEUR:   <strong>{{$data_info_cert_heberg->domicile_demandeur}}</strong> </li>                            
                            <li class="list-group-item">PROFESSION DU DEMANDEUR:   <strong>{{$data_info_cert_heberg->profession_demandeur}}</strong> </li>                            
                            <li class="list-group-item">PROVENANCE :   <strong>{{$data_info_cert_heberg->provenance}}</strong> </li>
                            <li class="list-group-item">DUREE DU SEJOUR :   <strong>{{$data_info_cert_heberg->dure_sejour}}</strong> </li>
                            <li class="list-group-item">DATE DEBUT DU SEJOUR :   <strong>{{$data_info_cert_heberg->date_debut}}</strong> </li>
                            <li class="list-group-item">ADRESSE DE LIVRAISON :  <strong>{{ $data_info_cert_heberg->lieu_livraison }}</strong> </li>
                            <li class="list-group-item">DATE DE LA DEMANDE :    <strong>{{ $data_info_cert_heberg->created_at }}</strong> </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">NOMBRE (S) DE COPIE :   <strong> {{$data_info_cert_heberg->nbre_copie}}</strong> </li>
                            <li class="list-group-item">MONTANT :   <strong>{{ $data_info_cert_heberg->montant_timbre }}</strong></li>
                            <li class="list-group-item">MONTANT LIVRAISON:   <strong>{{ $data_info_cert_heberg->montant_livraison }}</strong></li>
                            <li class="list-group-item">FICHIER : </li>
                        </ul>
                    </div>
                    
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="text-center">
                            <a class="main-btn" href="{{ route('documents',$keys['key']) }}">Retour</a>
                            <a class="main-btn" href="{{ route('documents_processing_heberg',[$keys['ID'],$keys['key']]) }}">Mettre en traitement</a>
                            <a class="main-btn main-btn-2" href="#">Imprimer</a>
                        </div>
                    </div>                
                </div>
            @endif
        </div>
    </section>
@endsection