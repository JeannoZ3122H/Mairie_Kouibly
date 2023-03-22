@extends('layouts.damin_master')


@section('content')
    <section class="blog-2-area pb-100 pt-100">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="#">
                            <h3 class="title">Listes des presses</h3>
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        <h3 class="title">Presses</h3>
                    </li>
                    
                </ol>

                <div class=" d-flex justify-content-end">

                    @if (isset($get_presse) || isset($show_presse))
                        <a href="{{ route('presse') }}">
                            <button class="btn btn-danger m-2"> 
                                <i class="align-middle me-2" data-feather="corner-down-left"></i>
                                Retour                                      
                            </button>
                        </a> 
                    @endif
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </button>
                    
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-md-12 col-sm-8">
                    @if (isset($show_presse))
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-7 col-sm-9">
                                <div class="blog-item mt-30 mb-30">
                                    <div class="blog-thumb">
                                        <img src="{{ $show_presse->image }}" alt="blog">
                                    </div>
                                    <div class="blog-content">
                                        <a href="#"><h3 class="title">{{ $show_presse->titre }}</h3></a>
                                        <p>{!! $show_presse->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($get_presse))
                        <form action="{{ route('update_presse', $get_presse->id) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">IMAGE</label>
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">TITRE</label>
                                    <input type="text" name="titre" value="{{ old('titre')?? $get_presse->titre }}" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">URL</label>
                                    <input type="text" name="url_presse" value="{{ old('url_presse')?? $get_presse->url_presse }}" class="form-control" id="exampleFormControlInput1">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                        </form> 
                    @endif
                    <div class="table-responsive">
                        @if(isset($presses))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">TITRE</th>
                                        <th class="text-center">URL</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>                     
                                </thead>
                                
                                <tbody>                              
                                    @foreach ($presses as $presse)
                                        <tr>
                                            <td>{{ $presse->titre }}</td>
                                            <td>{{ $presse->url_presse }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('show_presse', $presse->id) }}" class="btn btn-primary">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('edit_presse', $presse->id) }}" class="btn btn-success">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <form action="{{ route('destroy_presse', $presse->id) }}" method="post">
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
                            <h5 class="modal-title" id="exampleModalLabel">Presse</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add_presse') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">IMAGE</label>
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">TITRE</label>
                                    <input type="text" name="titre" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">URL</label>
                                    <input type="text" name="url_presse" class="form-control" id="exampleFormControlInput1">
                                </div>                                
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
