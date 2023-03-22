@extends('layouts.damin_master')


@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="#">
                            <h3 class="title">Listes des documents administratifs</h3>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <h3 class="title">Documents administratifs</h3>
                    </li>
                </ol>

                <div class="d-flex justify-content-end">
                    @if (isset($get_document))
                        <a href="{{ route('document_admin') }}">
                            <button class="btn btn-danger m-2"> 
                                <i class="align-middle me-2" data-feather="corner-down-left"></i>
                                Retour                                      
                            </button>
                        </a> 
                    @endif

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter un document
                    </button>               
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-md-12 col-sm-8">
                    @if (isset($get_document))
                        <form action="{{ route('update_document', $get_document->id) }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">DOCUMENTS</label>
                                <input type="text" class="form-control fs-3" name="name" value="{{old('name')?? $get_document->name }}">
                            </div>

                            <a>
                                <button type="submit" class="btn btn-success fs-4">Modifier</button>
                            </a>										
                        </form>
                    @endif
                    <div class="table-responsive">
                        @if(isset($documents))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">DOCUMENTS</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>                     
                                </thead>
                                
                                <tbody>                              
                                    @foreach ($documents as $doc)
                                        <tr>
                                            <td>{{ $doc->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('edit_document', $doc->id) }}" class="btn btn-success">
                                                    Modifier
                                                </a>

                                                
                                                <a href="{{ route('destroy_document', $doc->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                    Supprimer
                                                </a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add_document') }}" method="post">

                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $('#summernote').summernote({
            placeholder: 'Saississez un texte ici',
            tabsize: 2,
            height: 120,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection