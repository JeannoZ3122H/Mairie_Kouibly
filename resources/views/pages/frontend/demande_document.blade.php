@extends('layouts.front_master')

@section('content')
    <section class="shop-page-area bg-success mt-20 pt-40  pb-100">
        <div class="container">
            <div class="row mb-3">
                    <div class="col-lg-6">
                        @if (isset($documents_info))
                            <h2>{{ $documents_info->name }}</h2>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('front/img/py.png') }}" width="400px" alt="">
                    </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card pt-20 pb-30" style="width: 100%; border-radius:10px">
                        <div class="card-body">

                            {{-- CERTIFICAT DE DECES --}}
                            @if ($documents_info->name == 'CERTIFICAT D\'ACTE DE DECES')
                                <form action="{{ route('add_certificat_deces') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">


                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="profession_defunt" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la profession du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="lieu_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le lieu de naissance du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_deces" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la date du décès du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="lieu_deces" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le lieu du décès du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_pere" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du père du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="domicile_pere" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le domicile du père du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_mere" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom de la mère du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="domicile_mere" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le domicile de la mère du défunt <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_declarant" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du déclarant <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_declarant" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez l'email du déclarant </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_declarant" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrer le numéro du déclarant <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="nombre_copie" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
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

                            {{-- CERTIFICAT DE VIE --}}
                            @if ($documents_info->name == 'CERTIFICAT DE VIE')
                                <form action="{{ route('add_certificat_vie') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">


                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="profession" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la profession du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="lieu_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le lieu de naissance du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la date de naissance du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="domicile" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le domicile du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_pere" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du père du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_mere" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom de la mère du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez l'email du demandeur </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="nombre_copie" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>electionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                        <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
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

                            {{-- AUTORISATION PARENTALE --}}
                            @if ($documents_info->name == 'AUTORISATION PARENTALE')
                                <form action="{{ route('add_autorisation_parentale') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">


                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez l'email du demandeur </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la date de naissance du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="lieu_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrezle lieu de naissance du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="domicile" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le domicile du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="profession" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la profession du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="nombre_copie" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
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

                            {{-- ATTESTATION DE PRISE EN CHARGE --}}
                            @if ($documents_info->name == 'ATTESTATION DE PRISE EN CHARGE')
                                <form action="{{ route('add_attestation_prise_charge') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">


                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du demandeur </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez l'email du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="domicile_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le domicile du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="profession_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la profession du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la date de naissance du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="lieu_naissance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le lieu de naissance du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="nombre_copie" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
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

                            {{-- CERTIFICAT D'HEBERGEMENT --}}
                            @if ($documents_info->name == 'CERTIFICAT D\'HEBERGEMENT')
                                <form action="{{ route('add_certificat_heberg') }}" method="post"enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">


                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez l'email du demandeur </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="domicile_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le domicile du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="profession_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la profession du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="provenance" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la provenance du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="dure_sejour" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la durée de séjour du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_debut" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la date début du séjour <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="nombre_copie" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
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

                            {{-- DECLARATION OU PROCURATION --}}
                            @if ($documents_info->name == 'DECLARATION DE POUVOIR OU PROCURATION')
                                <form action="{{ route('add_declaration_procu') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">


                                    <div class="form-floating mb-3">
                                        <input type="text" name="name_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez l'email du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="profession_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez la profession du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="cni_demandeur" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro CNI du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le nom et prénom du concerné <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="nombre_copie" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
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

                            {{-- EXTRAIT DE NAISSANCE --}}
                            @if ($documents_info->name == 'EXTRAIT D\'ACTE DE NAISSANCE')
                                <form action="{{ route('add_extrait') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="document_id" value="{{$documents_info->id}}">
                                    <input type="hidden" name="document_rfk" value="{{$documents_info->rfk}}">

                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez votre nom complet <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_extrait" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Entrez le numéro du registre de l'extrait <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" name="email_demandeur" class="form-control" id="floatingInput1" placeholder="">
                                        <label for="floatingInput1">Email du demandeur</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="num_demandeur" class="form-control" id="floatingInput2" placeholder="">
                                        <label for="floatingInput2">Numéro de téléphone du demandeur <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class=" form-control" name="nombre_copie"  aria-label="Floating label select example">
                                            <option selected>Selectionnez le nombre de copie</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="montant_timbre" class="form-control" id="floatingInput4" value="{{ $montant_timbre }}" readonly>
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
                                                    <option value="{{ $lieu->lieu }}">{{ $lieu->lieu ."   ( ".$lieu->montant." FCFA )"  }}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="adresse_livraison" id="floatingInput" placeholder="Password">
                                            <label for="floatingInput">Adresse de livraison du document <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-floating">
                                        <label for="formFileLg" class="form-label">Charger un document (pdf)</label>
                                        <input class="form-control form-control-lg" name="extrait_file" id="formFileLg" type="file">
                                    </div>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-danger">Continue ici</button>
                                    </div>
                                </form>
                            @endif
                        </div>
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
