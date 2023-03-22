@extends('layouts.damin_master')


@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="#">
                            <h3 class="title">Listes des utilisateurs</h3>
                        </a>
                    </li>
                    
                </ol>

                <div class="d-flex justify-content-end">
                    @if (isset($single_user) || isset($show_user))
                        <a href="{{ route('users_list') }}">
                            <button class="btn btn-danger m-2"> 
                                <i class="align-middle me-2" data-feather="corner-down-left"></i>
                                Retour                                      
                            </button>
                        </a> 
                    @endif

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter un utilisateur
                    </button>               
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-md-12 col-sm-8">
                    @if (isset($show_user))
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-7 col-sm-9">
                                <form action="{{ route('show_user', $show_user->id) }}" method="post" enctype="multipart/form-data">

                                    @csrf
        
                                    <div class="modal-body">
        
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">NOM & PRENOMS</label>
                                            <input type="text" name="full_name" disabled value="{{ old('full_name')?? $show_user->full_name }}" class="form-control" id="exampleFormControlInput1">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                                            <input type="email" name="email" disabled value="{{ old('email')?? $show_user->email }}" class="form-control" id="exampleFormControlInput1">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">ROLE</label>
                                            <select class="form-control" disabled  aria-label="Default select example" name="role_id">
                                                <option value="{{ old('role_id')?? $show_user->role_id }}" selected>{{ $show_user->name }}</option>
                                                @if (isset($all_role))
                                                    @foreach ($all_role as $items)
                                                        <option value="{{ $items->id }}">{{ $items->name}}</option>   
                                                    @endforeach
                                                @endif                                        
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">PHOTO</label>
                                            <input type="file" name="photo" disabled value="{{ old('photo')?? $show_user->photo }}" class="form-control" id="exampleFormControlInput1">
                                        </div>
        
                                    </div>
        
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                    @if (isset($single_user))
                        <form action="{{ route('update_user', $single_user->id) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">NOM & PRENOMS</label>
                                    <input type="text" name="full_name" value="{{ old('full_name')?? $single_user->full_name }}" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                                    <input type="email" name="email" value="{{ old('email')?? $single_user->email }}" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">ROLE</label>
                                    <select class="form-control"  aria-label="Default select example" name="role_id">
                                        <option value="{{ old('role_id')?? $single_user->role_id }}" selected>{{ $single_user->name }}</option>
                                        @if (isset($all_role))
                                            @foreach ($all_role as $items)
                                                <option value="{{ $items->id }}">{{ $items->name}}</option>   
                                            @endforeach
                                        @endif                                        
                                    </select>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                        </form>
                    @endif
                    
                    <div class="table-responsive">
                        @if(isset($list_user))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">NOMS & PRENOMS</th>
                                        <th class="text-center">ADRESSE EMAIL</th>
                                        <th class="text-center">ROLE</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>                     
                                </thead>
                                
                                <tbody>
                                    
                                    @foreach ($list_user as $items)
                                        <tr>
                                            <td class="text-center"> {{ $items->full_name }}</td>
                                            <td class="text-center">{{ $items->email }}</td>
                                            <td class="text-center">{{ $items->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('show_user', $items->id) }}" class="btn btn-primary"><i class="far fa-eye"></i></a>

                                                <a href="{{ route('edit_user', $items->id) }}" class="btn btn-success"><i class="far fa-edit"></i></a>

                                                <form action="{{ route('delete_user', $items->id) }}" method="post">
                                                    @csrf

                                                    <button class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer cette action ?')">
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
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add_user') }}" method="post">
                        
                            @csrf

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">NOM & PRENOMS</label>
                                    <input type="text" name="full_name" class="form-control" id="exampleFormControlInput1">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">PASSWORD</label>
                                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">ROLE</label>
                                    <select class="form-control" aria-label="Default select example" name="role_id">
                                        <option selected>Selectionnez un rôle</option>
                                        @if (isset($all_role))
                                            @foreach ($all_role as $items)
                                                <option value="{{ $items->id }}">{{ $items->name}}</option>   
                                            @endforeach
                                        @endif                                        
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">PHOTO</label>
                                    <input type="file" name="photo" class="form-control" id="exampleFormControlInput1">
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