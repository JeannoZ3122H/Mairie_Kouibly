<header class="header-area">

    <div class="header-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigation ">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFive" aria-controls="navbarFive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button> <!-- navbar toggler -->
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarFive">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="{{ route('admin_front') }}">
                                            <i class="fa fa-home fa-2x"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">La Mairie +</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('maire') }}">Cabinet du maire</a></li>
                                            <li><a href="{{ route('municip') }}">La Municipalité</a></li>
                                            <li><a href="{{ route('conseillers') }}">Les conseillers</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Nos services +</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('secretariat') }}">Sécrétariat général</a></li>
                                            <li><a href="{{ route('ad_financier') }}">Administratif</a></li>
                                            <li><a href="{{ route('financier') }}">Financier</a></li>
                                            <li><a href="{{ route('technique') }}">Technique</a></li>
                                            <li><a href="{{ route('socio_cult') }}">Socio culturel et de promotion humain</a></li> 
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('actualite') }}">Actualités</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('decouverte') }}">Découverte</a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('agenda') }}">Agenda</a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('presse') }}">Presse</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Autres pratiques +</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                                            <li><a href="{{ route('cgu') }}">CGU</a></li>
                                            <li><a href="{{ route('mention') }}">Mentions légales</a></li>
                                            <li><a href="{{ route('biographie') }}">Biographie</a></li>
                                        </ul>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Demande Administratifs +</a>
                                        <ul class="sub-menu">
                                            @if (isset($liste_documents))                                            
                                                @foreach ($liste_documents as $liste_doc )
                                                    <li><a href="{{ route('documents', $liste_doc->rfk) }}">{{ $liste_doc->name }}</a></li>
                                                @endforeach
                                            @endif                                        
                                        </ul>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('contacts') }}">Contacts</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Paramètres +</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('document_admin') }}">Documents Administratifs</a></li>

                                            <li><a href="{{ route('timbre') }}">Montant de timbre</a></li>
                                            
                                            <li><a href="{{ route('lieu_livraison') }}">Lieu de livraison</a></li>

                                            <li><a href="{{ route('users_list') }}">Gestion des utilisateurs</a></li>

                                            <li><a href="{{ route('update_password') }}">Modification de mot de passe</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar-btns">
                                <ul>
                                    <li>
                                        <a class=" d-lg-inline" href="{{ route('deconnexion') }}">                                            
                                            <i class="fa fa-sign-out"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>