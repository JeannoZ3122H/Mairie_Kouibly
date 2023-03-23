@extends('layouts.damin_master')



@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <h3 class="title">Listes des demandes</h3>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <h3 class="title text-lowercase">{{ $documents_info->name }}</h3>
                    </li>
                </ol>
            </nav>
            
            <div class="row justify-content-center">
                @if (isset($get_document_type))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>
                                        
                                        <th class="text-center">N° Extrait</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->num_extrait }}</td>
                                            <td>{{ $document_type->email_demandeur }}</td>
                                            <td>{{ $document_type->num_demandeur }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>
                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('documents_edit',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>

                                                <form action="{{ route('documents_delete', $document_type->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                        <i class="far fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type->links() }}
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (isset($get_document_type_v))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>                                        
                                        <th class="text-center">Nom et Prenoms du concerné</th>
                                        <th class="text-center">Profession</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type_v as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->full_name }}</td>
                                            <td>{{ $document_type->profession }}</td>
                                            <td>{{ $document_type->email_demandeur }}</td>
                                            <td>{{ $document_type->num_demandeur }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>

                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_vie',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_vie',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('documents_edit_vie',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>

                                                <form action="{{ route('documents_delete_vie', $document_type->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                        <i class="far fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type_v->links() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($get_document_type_d))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>                                        
                                        <th class="text-center">Nom et Prenoms du défunt</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type_d as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->full_name }}</td>
                                            <td>{{ $document_type->email_declarant }}</td>
                                            <td>{{ $document_type->num_declarant }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>
                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_deces',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_deces',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('documents_edit_deces',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>

                                                <form action="{{ route('documents_delete_deces', $document_type->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                        <i class="far fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type_d->links() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($get_document_type_ap))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>
                                        
                                        <th class="text-center">Nom du concerné</th>
                                        <th class="text-center">Nom du demandeur</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type_ap as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->full_name }}</td>
                                            <td>{{ $document_type->name_demandeur }}</td>
                                            <td>{{ $document_type->email_demandeur }}</td>
                                            <td>{{ $document_type->num_demandeur }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>
                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_auto',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_auto',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('documents_edit_aut_par',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('documents_delete_aut_par', $document_type->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                    <i class="far fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type_ap->links() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($get_document_type_ac))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>
                                        
                                        <th class="text-center">Nom du concerné</th>
                                        <th class="text-center">Nom du demandeur</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type_ac as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->full_name }}</td>
                                            <td>{{ $document_type->name_demandeur }}</td>
                                            <td>{{ $document_type->email_demandeur }}</td>
                                            <td>{{ $document_type->num_demandeur }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>
                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_attes',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_attes',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('documents_edit_attes_charg',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('documents_delete_attes_charg', $document_type->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                    <i class="far fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type_ac->links() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($get_document_type_ch))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>
                                        
                                        <th class="text-center">Nom du demandeur</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type_ch as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->name_demandeur }}</td>
                                            <td>{{ $document_type->email_demandeur }}</td>
                                            <td>{{ $document_type->num_demandeur }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>
                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_heberg',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_heberg',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('documents_edit_cert_heberg',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('documents_delete_cert_heberg', $document_type->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                    <i class="far fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type_ch->links() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($get_document_type_dp))
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID transaction</th>
                                        
                                        <th class="text-center">Nom du concerné</th>
                                        <th class="text-center">Nom du demandeur</th>
                                        <th class="text-center">Email demandeur</th>
                                        <th class="text-center">Téléphone demandeur</th>
                                        <th class="text-center">Nombre copie</th>
                                        <th class="text-center">Montant Timbre</th>
                                        <th class="text-center">Montant livraison</th>
                                        <th class="text-center">Paiement</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Confirmation de traitement</th>
                                        <th class="text-center">Action</th>
                                    </tr>                               
                                </thead>

                                <tbody>                                       
                                    @foreach ($get_document_type_dp as $document_type)
                                        <tr>
                                            <td>{{ $document_type->transaction_rf }}</td>
                                            <td>{{ $document_type->full_name }}</td>
                                            <td>{{ $document_type->name_demandeur }}</td>
                                            <td>{{ $document_type->email_demandeur }}</td>
                                            <td>{{ $document_type->num_demandeur }}</td>
                                            <td>{{ $document_type->nbre_copie }}</td>
                                            <td>{{ $document_type->montant_timbre }}</td>
                                            <td>{{ $document_type->montant_livraison }}</td>
                                            <td>
                                                @if ((int)$document_type->paiement == 0)
                                                    <a class="btn btn-danger text-light">Rejeté</a>
                                                    @elseif ((int)$document_type->montant_livraison == 1)
                                                    <a class="btn btn-success text-light">Approuvé</a>
                                                @endif
                                            </td>
                                            <td>{{ $document_type->created_at }}</td>
                                            <td>
                                                @if (isset($role) && $role == "administrateur")                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 0)
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_decl',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light">
                                                            Terminez le traitement svp
                                                        </a>
                                                    @elseif ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 1)
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé !
                                                        </a>
                                                    @endif
                                                @endif
                                                
                                                @if (isset($role) && $role == "super_administrateur")
                                                    
                                                    @if ((int)$document_type->status_debut_traitement == 1 && (int)$document_type->status_livrable == 0)
                                                        <a href="{{ route('processing_publishing_decl',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-info text-light" disabled>
                                                            Terminez le traitement svp
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 0 && (int)$document_type->status_debut_traitement == 0) 
                                                        <a  class="btn btn-dark text-light" disabled>
                                                            Aucune action à ce document
                                                        </a>

                                                        @elseif ((int)$document_type->status_livrable == 1 && (int)$document_type->status_debut_traitement == 1) 
                                                        <a  class="btn btn-success text-light" disabled>
                                                            Traitement terminé
                                                        </a>
                                                    @endif
                                                @endif                                            
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('documents_edit_decl_pro',[$document_type->id, $documents_info->rfk ]) }}" class="btn btn-primary">
                                                    <i class="far fa-pen" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('documents_delete_decl_pro', $document_type->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                    <i class="far fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $get_document_type_dp->links() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($not_found))
                    <div class="text-center">
                        <h2>Aucune demande disponible pour ce document</h2>
                    </div>
                @endif 
            
            </div>
        </div>
    </section>
@endsection
