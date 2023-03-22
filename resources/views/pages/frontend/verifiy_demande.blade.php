@extends('layouts.front_master')

@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-6 col-sm-8">
                    <div class="card">
                        <div class="card-header"><h3 class="title">Vérification de la Demande </h3></div>   
                            <form action="{{ route('verify_numero') }}" method="post">

                                @csrf

                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <select class="form-select form-control" name="document_id" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Selectionnez un document</option>
                                            @foreach ($liste_documents as $doc)
                                                <option value="{{ $doc->id }}">{{ $doc->name }}</option>                                            
                                            @endforeach  
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="q"  class="form-control" id="floatingInput">
                                        <label for="floatingInput">Veuillez entrer votre numéro de téléphone</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right">
                                        <a class="main-btn" href="{{route('front')}}"> retour</a>
                                        <button class="main-btn"type="submit">Vérifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>               
            </div>
        </div>
    </section>
@endsection
