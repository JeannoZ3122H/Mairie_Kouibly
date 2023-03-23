@extends('layouts.damin_master')


@section('content')
    <section class="shop-page-area pt-130 pb-130">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="#">
                            <h3 class="title">Listes des contacts</h3>
                        </a>
                    </li>
                    
                </ol>

                <div class="d-flex justify-content-end">
                    @if (isset($contacts) || isset($show_contact))
                        <a href="{{ route('contacts') }}">
                            <button class="btn btn-danger m-2"> 
                                <i class="align-middle me-2" data-feather="corner-down-left"></i>
                                Retour                                      
                            </button>
                        </a> 
                    @endif               
                </div>
            </nav>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-8">
                    @if (isset($show_contact))
                        <form action="{{ route('show_contacts', $show_contact->id) }}" method="post">

                            @csrf
                        
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NOM COMPLET</label>
                                <input type="text" class="form-control" disabled name="full_name" value="{{old('full_name')?? $show_contact->full_name }}" id="exampleFormControlInput1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                                <input type="email" class="form-control" disabled name="email" value="{{old('email')?? $show_contact->email }}" id="exampleFormControlInput1">
                            </div>
                                
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">MESSAGE</label>
                                <textarea class="form-control" disabled name="message" id="exampleFormControlTextarea1" rows="2">{{ $show_contact->message }}</textarea>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="col-lg-12 col-md-12 col-sm-8">
                    <div class="table-responsive">
                        @if (isset($contacts))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">NOM COMPLET</th>
                                        <th class="text-center">EMAIL</th>
                                        <th class="text-center">MESSAGE</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $items)
                                        <tr>
                                            <td>{{ $items->full_name }}</td>
                                            <td>{{ $items->email }}</td>
                                            <td width="1000">{!! $items->message !!}</td>
                                            
                                            <td class="text-center d-flex">
                                                <a href="{{ route('show_contacts', $items->id) }}" class="btn btn-primary">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <form action="{{ route('destroy_contacts', $items->id) }}" method="post">
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
        </div>
    </section>
@endsection
