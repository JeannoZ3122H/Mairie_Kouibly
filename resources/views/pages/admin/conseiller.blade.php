@extends('layouts.damin_master')




@section('content')
    <section class="blog-2-area pb-100 pt-100">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="#">
                            <h3 class="title">Listes des conseillers</h3>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <h3 class="title">Conseillers</h3>
                    </li>
                </ol>

                <div class=" d-flex justify-content-end">

                    @if (isset($get_conseillers) || isset($show_conseillers))
                        <a href="{{ route('arrah_bref') }}">
                            <button class="btn btn-danger m-2"> 
                                <i class="align-middle me-2" data-feather="corner-down-left"></i>
                                Retour                                      
                            </button>
                        </a> 
                    @endif
                    @if (isset($conseiller))
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Ajouter un conseiller
                        </button>
                    @endif
                                
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-md-12 col-sm-8">
                    @if (isset($show_conseiller))
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-7 col-sm-9">
                                <div class="blog-item mt-30 mb-30">
                                    <div class="blog-thumb">
                                        <img src="{{ $show_conseiller->image }}" alt="blog">
                                    </div>
                                    <div class="blog-content text-center">
                                        <p>{!! $show_conseiller->full_name !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($get_conseillers))
                        <form action="{{ route('update_conseillers', $get_conseillers->id) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <br>                                                                
                                <label for="exampleFormControlInput1" class="form-label">Nom & Prénom</label>
                                <input type="text" name="full_name" value="{{ old('full_name') ?? $get_conseillers->full_name }}" class="form-control" id="exampleFormControlInput1">
                                <br>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                        </form> 
                    @endif
                    <div class="table-responsive">
                        @if(isset($conseiller))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nom & Prénom</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>                     
                                </thead>
                                
                                <tbody>                              
                                    @foreach ($conseiller as $items)
                                        <tr>
                                            <td class="text-center">{!! $items->full_name !!}</td>
                                            <td class="text-center">
                                                <a href="{{ route('show_conseillers', $items->id) }}" class="btn btn-primary">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('edit_conseillers', $items->id) }}" class="btn btn-success">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                
                                                <form  action="{{ route('destroy_conseillers', $items->id) }}"" method="post">
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
                        @endif                            
                    </div>
                </div>
                
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualités</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add_conseillers') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <br>                                                                
                                <label for="exampleFormControlInput1" class="form-label">Nom complet</label>
                                <input type="text" name="full_name" class="form-control" id="exampleFormControlInput1">
                                <br>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BLOG 2 PART ENDS ======-->
@endsection



@section('scripts')

@endsection
