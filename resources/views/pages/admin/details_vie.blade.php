@extends('layouts.damin_master')

@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <div class="section-title">
                <h3 class="title">
                    Détails de demande de certificat de vie
                </h3>                
            </div>

            @if ($data_info_cert_vie)
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item">NOM ET PRENOMS DU CONCERNE :   <strong>{{$data_info_cert_vie->full_name}}</strong> </li>
                            <li class="list-group-item">PROFESSION :   <strong>{{$data_info_cert_vie->profession}}</strong> </li>
                            <li class="list-group-item">LIEU DE NAISSANCE :   <strong>{{$data_info_cert_vie->lieu_naissance}}</strong> </li>
                            <li class="list-group-item">DATE DE NAISSANCE :   <strong>{{$data_info_cert_vie->date_naissance}}</strong> </li>
                            <li class="list-group-item">DOMICILE :   <strong>{{$data_info_cert_vie->domicile}}</strong> </li>
                            <li class="list-group-item">NOM ET PRENOM DU PERE :   <strong>{{$data_info_cert_vie->name_pere}}</strong> </li>
                            <li class="list-group-item">NOM ET PRENOM DE LA MERE :   <strong>{{$data_info_cert_vie->name_mere}}</strong> </li>
                            <li class="list-group-item">NOM DU DEMANDEUR :   <strong>{{$data_info_cert_vie->name_demandeur}}</strong> </li>
                            <li class="list-group-item">EMAIL DU DEMANDEUR :   <strong>{{$data_info_cert_vie->email_demandeur}}</strong> </li>
                            <li class="list-group-item">NUMERO DU DEMANDEUR :   <strong>{{$data_info_cert_vie->num_demandeur}}</strong> </li>
                            <li class="list-group-item">ADRESSE DE LIVRAISON :  <strong>{{ $data_info_cert_vie->lieu_livraison }}</strong> </li>
                            <li class="list-group-item">DATE DE LA DEMANDE :    <strong>{{ $data_info_cert_vie->created_at }}</strong> </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">NOMBRE (S) DE COPIE :   <strong> {{$data_info_cert_vie->nbre_copie}}</strong> </li>
                            <li class="list-group-item">MONTANT :   <strong>{{ $data_info_cert_vie->montant_timbre }}</strong></li>
                            <li class="list-group-item">MONTANT LIVRAISON:   <strong>{{ $data_info_cert_vie->montant_livraison }}</strong></li>
                            <li class="list-group-item">FICHIER : </li>
                        </ul>
                    </div>                    
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="text-center">
                            <a class="main-btn" href="{{ route('documents',$keys['key']) }}">Retour</a>
                            <a class="main-btn" href="{{ route('documents_processing_vie',[$keys['ID'],$keys['key']]) }}">Mettre en traitement</a>
                            <a class="main-btn main-btn-2" href="#">Imprimer</a>
                        </div>
                    </div>                
                </div>
            @endif
        </div>
    </section>
@endsection