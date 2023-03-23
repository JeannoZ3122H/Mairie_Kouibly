@extends('layouts.damin_master')

@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <div class="section-title">
                <h3 class="title">
                    Détail de demande d' extrait de naissance
                </h3>                
            </div>
            @if ($data_info)
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item">TELEPHONE DU DEMANDEUR :   <strong>{{$data_info->num_demandeur}}</strong> </li>
                            <li class="list-group-item">EMAIL DU DEMANDEUR :   <strong>{{$data_info->email_demandeur}}</strong> </li>
                            <li class="list-group-item">ADRESSE DE LIVRAISON :  <strong>{{ $data_info->lieu_livraison }}</strong> </li>
                            <li class="list-group-item">DATE DE LA DEMANDE :    <strong>{{ $data_info->created_at }}</strong> </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">N° DU REGISTRE :  <strong>{{$data_info->num_extrait}}</strong></li>
                            <li class="list-group-item">NOMBRE (S) DE COPIE :   <strong> {{$data_info->nbre_copie}}</strong> </li>
                            <li class="list-group-item">MONTANT :   <strong>{{ $data_info->montant_timbre }}</strong></li>
                            <li class="list-group-item">MONTANT LIVRAISON:   <strong>{{ $data_info->montant_livraison }}</strong></li>
                            <li class="list-group-item">FICHIER : </li>
                        </ul>
                    </div>
                    
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="text-center">
                            <a class="main-btn" href="{{ route('documents',$keys['key']) }}">Retour</a>
                            <a class="main-btn" href="{{ route('documents_processing',[$keys['ID'],$keys['key']]) }}">Mettre en traitement</a>
                            <a class="main-btn main-btn-2" href="#">Imprimer</a>
                        </div>
                    </div>
                    
                    
                </div>
            @endif
        </div>
    </section>
@endsection
    
