@extends('layouts.damin_master')


@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="{{ route('technique') }}">
                            <h3 class="title">Technique</h3>
                        </a>
                    </li>
                    
                </ol>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </button>               
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                @if (isset($get_technique))
                    <div class="col-lg-6 col-md-12 col-sm-8">
                        <form action="{{ route('update_technique',$get_technique->id) }}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">RESPONSABLE</label>
                                    <input type="text" value="{{ old('responsable') ?? $get_technique->responsable }}" name="responsable" class="form-control" id="exampleFormControlInput1" placeholder="">
                                </div>
                                <br>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION</label>
                                    <textarea class="form-control" name="description" id="summernote" rows="2">
                                        {{  $get_technique->description }}
                                    </textarea>
                                </div>

                                <br>
                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">Image</label>
                                    <input name="image" class="form-control form-control-lg" id="formFileLg" type="file">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>

                        </form>
                    </div>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-8">
                    <div class="table-responsive">
                        @if (isset($techniques))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">RESPONSABLE</th>
                                        <th class="text-center">DESCRIPTION</th>
                                        
                                        <th class="text-center">ACTIONS</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach ($techniques as $items)
                                        <tr>
                                            <td>{{ $items->responsable }}</td>
                                            <td width="1000">{!! $items->description !!}</td>
                                            
                                            <td class="text-center d-flex">
                                                <a href="{{ route('edit_technique', $items->id) }}" class="btn btn-success">
                                                    Modifier
                                                </a>
                                                <form action="{{ route('destroy_technique', $items->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
                                                        Supprimer
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
                            <h5 class="modal-title" id="exampleModalLabel">Technique</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add_technique') }}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">RESPONSABLE</label>
                                    <input type="text" name="responsable" class="form-control" id="exampleFormControlInput1" placeholder="">
                                </div>
                                <br>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION</label>
                                    <textarea class="form-control" name="description" id="summernote" rows="2"></textarea>
                                </div>

                                <br>
                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">IMAGE</label>
                                    <input name="image" class="form-control form-control-lg" id="formFileLg" type="file">
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