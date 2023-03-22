@extends('layouts.damin_master')



@section('content')
<main class="content">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Changer le mot de passe pour un utilisateur</h5>
                        @if (isset($all_user))
                            <form action="{{ route('init_password') }}" method="POST">

                                @csrf


                                <div class="mb-3">
                                    <label class="form-label">Listes des utilisateurs</label>
                                    <select class="form-control" name="id">
                                        <option selected>Selectionnez un utilisateur</option>
                                        @if (isset($all_user))
                                            @foreach ($all_user as $items)
                                                <option value="{{  $items->id }}">{{  $items->email }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">Nouveau mot de passe</label>
                                    <input type="password" class="form-control fs-4" name="password" id="password">
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="update" value="modifier" class="btn btn-success fs-4 btn-lg">Modifier</button>
                                </div>
                                
                            </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>

</main>
@endsection