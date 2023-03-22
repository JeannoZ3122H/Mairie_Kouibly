@extends('layouts.front_master')

@section('content')
    <section class="shop-page-area pt-40 pb-100">      
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-6">
                    @if (isset($documents_info))
                        <h2>{{ $documents_info->name }}</h2>
                    @endif
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/marieimg/py.png') }}" alt="">
                </div>   
                
            </div>
            <br>
            <br>

            <div class="col-lg-8">
                <div class="card pt-20 pb-30" style="width: 110%;">
                    <div class="card-body">
                        @if (isset($data_info))
                            <form action="{{ route('demande_documents_update_extr', $data_info->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                <div class="form-floating mb-3">
                                    <input type="text" name="full_name" value="{{$data_info->full_name}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre nom complet: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_extrait" value="{{$data_info->num_extrait}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput"> Numéro de l'extrait: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_demandeur" value="{{$data_info->email_demandeur}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Email du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_demandeur" value="{{$data_info->num_demandeur}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Numéro du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Veuillez selectionner un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif

                        @if (isset($data_info_cert_vie))
                            <form action="{{ route('demande_documents_update', $data_info_cert_vie->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                <div class="form-floating mb-3">
                                    <input type="text" name="full_name" value="{{$data_info_cert_vie->full_name}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre nom complet: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="profession" value="{{$data_info_cert_vie->profession}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre profession: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="lieu_naissance" value="{{$data_info_cert_vie->lieu_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre lieu de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="date_naissance" value="{{$data_info_cert_vie->date_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre date de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="domicile" value="{{$data_info_cert_vie->domicile}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre domicile: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name_pere" value="{{$data_info_cert_vie->name_pere}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom du père: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name_mere" value="{{$data_info_cert_vie->name_mere}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom de la mère: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name_demandeur" value="{{$data_info_cert_vie->name_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_demandeur" value="{{$data_info_cert_vie->email_demandeur}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Email du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_demandeur" value="{{$data_info_cert_vie->num_demandeur}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Numéro du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info_cert_vie->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
    
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$data_info_cert_vie->adresse_livraison}}" name="adresse_livraison" id="floatingInput">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif

                        @if (isset($data_info_cert_deces))
                            <form action="{{ route('demande_documents_update_deces', $data_info_cert_deces->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                <div class="form-floating mb-3">
                                    <input type="text" name="full_name" value="{{$data_info_cert_deces->full_name}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer le nom du défunt: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="profession_defunt" value="{{$data_info_cert_deces->profession_defunt}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer sa profession: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="lieu_naissance" value="{{$data_info_cert_deces->lieu_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer son lieu de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="date_deces" value="{{$data_info_cert_deces->date_deces}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer sa date du décès: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="lieu_deces" value="{{$data_info_cert_deces->lieu_deces}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer son lieu du décès: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name_pere" value="{{$data_info_cert_deces->name_pere}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer le nom et prénom de son père: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="domicile_pere" value="{{$data_info_cert_deces->domicile_pere}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer le domicile de son père: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name_mere" value="{{$data_info_cert_deces->name_mere}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom de sa mère: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="domicile_mere" value="{{$data_info_cert_deces->domicile_mere}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer le domicile de sa mère: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name_declarant" value="{{$data_info_cert_deces->name_declarant}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Veillez entrer le nom du déclarant: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_declarant" value="{{$data_info_cert_deces->email_declarant}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Veillez entrer l'email du déclarant: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_declarant" value="{{$data_info_cert_deces->num_declarant}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Veillez entrer le numéro du déclarant": <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info_cert_deces->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
    
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$data_info_cert_deces->adresse_livraison}}" name="adresse_livraison" id="floatingInput">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif

                        @if (isset($data_info_auto_paren))
                            <form action="{{ route('demande_documents_update_aut_pare', $data_info_auto_paren->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="name_demandeur" value="{{$data_info_auto_paren->name_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_demandeur" value="{{$data_info_auto_paren->email_demandeur}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Email du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_demandeur" value="{{$data_info_auto_paren->num_demandeur}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Numéro du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="full_name" value="{{$data_info_auto_paren->full_name}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre nom complet: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="lieu_naissance" value="{{$data_info_auto_paren->lieu_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre lieu de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="date_naissance" value="{{$data_info_auto_paren->date_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre date de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="domicile" value="{{$data_info_auto_paren->domicile}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre domicile: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="profession" value="{{$data_info_auto_paren->profession}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre profession: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info_auto_paren->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
    
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$data_info_auto_paren->adresse_livraison}}" name="adresse_livraison" id="floatingInput">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif

                        @if (isset($data_info_attes_prise_charge))
                            <form action="{{ route('demande_documents_update_attestation_prise_charge', $data_info_attes_prise_charge->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="name_demandeur" value="{{$data_info_attes_prise_charge->name_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_demandeur" value="{{$data_info_attes_prise_charge->email_demandeur}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Email du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_demandeur" value="{{$data_info_attes_prise_charge->num_demandeur}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Numéro du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="domicile_demandeur" value="{{$data_info_attes_prise_charge->domicile_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Domicile du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="profession_demandeur" value="{{$data_info_attes_prise_charge->profession_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Profession du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="full_name" value="{{$data_info_attes_prise_charge->full_name}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Nom complet du concerné: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="lieu_naissance" value="{{$data_info_attes_prise_charge->lieu_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre lieu de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="date_naissance" value="{{$data_info_attes_prise_charge->date_naissance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">votre date de naissance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info_attes_prise_charge->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
    
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$data_info_attes_prise_charge->adresse_livraison}}" name="adresse_livraison" id="floatingInput">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif

                        @if (isset($data_info_certificat_heberg))
                            <form action="{{ route('demande_documents_update_certificat_heberg', $data_info_certificat_heberg->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="name_demandeur" value="{{$data_info_certificat_heberg->name_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_demandeur" value="{{$data_info_certificat_heberg->email_demandeur}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Email du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_demandeur" value="{{$data_info_certificat_heberg->num_demandeur}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Numéro du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="domicile_demandeur" value="{{$data_info_certificat_heberg->domicile_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Domicile du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="profession_demandeur" value="{{$data_info_certificat_heberg->profession_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Profession du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="provenance" value="{{$data_info_certificat_heberg->provenance}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Provenance: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="dure_sejour" value="{{$data_info_certificat_heberg->dure_sejour}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">La date du séjour: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="date_debut" value="{{$data_info_certificat_heberg->date_debut}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">La date début du séjour: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info_certificat_heberg->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$data_info_certificat_heberg->adresse_livraison}}" name="adresse_livraison" id="floatingInput">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif

                        @if (isset($data_info_decl_procu))
                            <form action="{{ route('demande_documents_update_declaration_procu', $data_info_decl_procu->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                
                                <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="name_demandeur" value="{{$data_info_decl_procu->name_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">le nom du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email_demandeur" value="{{$data_info_decl_procu->email_demandeur}}" class="form-control" id="floatingInput1" placeholder="">
                                    <label for="floatingInput">Email du demandeur: </label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="num_demandeur" value="{{$data_info_decl_procu->num_demandeur}}" class="form-control" id="floatingInput2" placeholder="">
                                    <label for="floatingInput2">Numéro du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="profession_demandeur" value="{{$data_info_decl_procu->profession_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Profession du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="cni_demandeur" value="{{$data_info_decl_procu->cni_demandeur}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Cni du demandeur: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="full_name" value="{{$data_info_decl_procu->full_name}}" class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Le nom du concerné: <span class="text-danger">*</span></label>
                                </div>


                                <div class="form-floating mb-3">
                                    <input type="number" name="nombre_copie" value="{{$data_info_decl_procu->nbre_copie}}"class="form-control" id="floatingInput3">
                                    <label for="floatingInput3">Nombre de copie: <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="500" readonly>
                                    <label for="floatingInput4">Montant du Timbre (FCFA) <span class="text-danger">*</span></label>
                                </div>

                                <div class="row justify-content-center mb-3">
                                    <h5 class="title mb-3">
                                        Recevoir ma demande par livraison(cochez la case ci-dessous)
                                    </h5>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="livraison">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="lieu_livraison" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un lieu de livraison</option>
                                            @if (isset($get_all_lieu_livraison))                                                   
                                                @foreach ($get_all_lieu_livraison as $lieu )
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$data_info_decl_procu->adresse_livraison}}" name="adresse_livraison" id="floatingInput">
                                        <label for="floatingInput">Adresse de livraison de l'extrait</label>
                                    </div>
                                </div>

                                <div class="mb-3 form-floating">
                                    <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                    <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                </div>
                                <div class="float-right">
                                    
                                    <button type="submit" class="main-btn">Continuer ici</button>
                                    
                                </div>
                            </form>
                        @endif
                    </div>
                </div>                    
            </div>
        </div>
    </section>

@endsection


@section('scripts')
    <script>
        $(document).ready(function () {

            
            $('#exampleRadios1').click(function () {
                if($(this).is(":checked")){
                    $('#livraison').show();
                }else{
                    $('#livraison').hide();
                }
            }); 
            
            $('#exampleRadios2').click(function () {
                if($(this).is(":checked")){
                    $('#livraison').hide();
                }else{
                    $('#livraison').hide();
                }
            }); 
        });
    </script>
@endsection

