@extends('layouts.damin_master')



@section('content')
    <section class="blog-2-area pb-100 pt-100">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="#">
                            <h3 class="title">Biographie</h3>
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        <h3 class="title">biographie</h3>
                    </li>
                    
                </ol>

                <div class=" d-flex justify-content-end">

                    @if (isset($get_biographie) || isset($show_biographie))
                        <a href="{{ route('biographie') }}">
                            <button class="btn btn-danger m-2"> 
                                <i class="align-middle me-2" data-feather="corner-down-left"></i>
                                Retour                                      
                            </button>
                        </a> 
                    @endif
                    
                    @if (isset($biographie))
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Ajouter une biographie
                        </button>
                    @endif
                    
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-md-12 col-sm-8">
                    @if (isset($show_biographie))
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-7 col-sm-9">
                                <div class="blog-item mt-30 mb-30">
                                    <div class="blog-thumb">
                                        <img src="{{ $show_biographie->image }}" alt="blog">
                                    </div>
                                    <div class="blog-content">
                                        <a href="#"><h3 class="title">{{ $show_biographie->titre }}</h3></a>
                                        <a href="#"><h3 class="title">{{ $show_biographie->nom }}</h3></a>
                                        <p>{!! $show_biographie->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($get_biographie))
                        <form action="{{ route('update_biographie', $get_biographie->id) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Titre</label>
                                    <input type="text" name="titre" value="{{ old('titre')?? $get_biographie->titre }}" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                    <input type="text" name="nom" value="{{ old('nom')?? $get_biographie->nom }}" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <br>                                                                
                                    <textarea id="summernote" name="description">{{ old('description')?? $get_biographie->description }}</textarea>
                                <br>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                        </form> 
                    @endif
                    <div class="table-responsive">
                        @if(isset($biographie))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">TITRE</th>
                                        <th class="text-center">NOM</th>
                                        <th class="text-center">DESCRIPTION</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>                     
                                </thead>
                                
                                <tbody>                              
                                    @foreach ($biographie as $items)
                                        <tr>
                                            <td>{{ $items->titre }}</td>
                                            <td>{{ $items->nom }}</td>
                                            <td>{!! substr($items->description, 0,160) !!}</td>
                                            <td class="text-center">
                                                <a href="{{ route('show_biographie', $items->id) }}" class="btn btn-primary">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('edit_biographie', $items->id) }}" class="btn btn-success">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <form action="{{ route('destroy_biographie', $items->id) }}" method="post">
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
                            <h5 class="modal-title" id="exampleModalLabel">Biographie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add_biographie') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Titre</label>
                                    <input type="text" name="titre" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <br>                                                                
                                    <textarea id="summernote" name="description"></textarea>
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
