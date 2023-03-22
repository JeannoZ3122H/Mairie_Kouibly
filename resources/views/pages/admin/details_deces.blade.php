
@extends('layouts.damin_master')

@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <div class="section-title">
                <h3 class="title">
                    Détails de demande de certificat de décès
                </h3>                
            </div>

            @if ($data_info_cert_deces)
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item">NOM ET PRENOMS DU DEFUNT :   <strong>{{$data_info_cert_deces->full_name}}</strong> </li>
                            <li class="list-group-item">PROFESSION DU DEFUNT :   <strong>{{$data_info_cert_deces->profession_defunt}}</strong> </li>
                            <li class="list-group-item">LIEU DE NAISSANCE :   <strong>{{$data_info_cert_deces->lieu_naissance}}</strong> </li>
                            <li class="list-group-item">DATE DU DECES :   <strong>{{$data_info_cert_deces->date_deces}}</strong> </li>
                            <li class="list-group-item">LIEU DU DECES :   <strong>{{$data_info_cert_deces->lieu_deces}}</strong> </li>
                            <li class="list-group-item">NOM ET PRENOMS DU PERE :   <strong>{{$data_info_cert_deces->name_pere}}</strong> </li>
                            <li class="list-group-item">DOMICILE DU PERE :   <strong>{{$data_info_cert_deces->domicile_pere}}</strong> </li>
                            <li class="list-group-item">NOM ET PRENOMS DE LA MERE :   <strong>{{$data_info_cert_deces->name_mere}}</strong> </li>
                            <li class="list-group-item">DOMICILE DE LA MERE :   <strong>{{$data_info_cert_deces->domicile_mere}}</strong> </li>
                            <li class="list-group-item">NOM ET PRENOMS DU DECLARANT :   <strong>{{$data_info_cert_deces->name_declarant}}</strong> </li>
                            <li class="list-group-item">EMAIL DU DECLARANT :   <strong>{{$data_info_cert_deces->email_declarant}}</strong> </li>
                            <li class="list-group-item">NUMERO DU DECLARANT :   <strong>{{$data_info_cert_deces->num_declarant}}</strong> </li>
                            <li class="list-group-item">ADRESSE DE LIVRAISON :  <strong>{{ $data_info_cert_deces->lieu_livraison }}</strong> </li>
                            <li class="list-group-item">DATE DE LA DEMANDE :    <strong>{{ $data_info_cert_deces->created_at }}</strong> </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">NOMBRE (S) DE COPIE :   <strong> {{$data_info_cert_deces->nbre_copie}}</strong> </li>
                            <li class="list-group-item">MONTANT :   <strong>{{ $data_info_cert_deces->montant_timbre }}</strong></li>
                            <li class="list-group-item">MONTANT LIVRAISON:   <strong>{{ $data_info_cert_deces->montant_livraison }}</strong></li>
                            <li class="list-group-item">FICHIER : </li>
                        </ul>
                    </div>
                    
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="text-center">
                            <a class="main-btn" href="{{ route('documents',$keys['key']) }}">Retour</a>
                            <a class="main-btn" href="{{ route('documents_processing_deces',[$keys['ID'],$keys['key']]) }}">Mettre en traitement</a>
                            <a class="main-btn main-btn-2" href="#">Imprimer</a>
                        </div>
                    </div>                
                </div>
            @endif
        </div>
    </section>
@endsection