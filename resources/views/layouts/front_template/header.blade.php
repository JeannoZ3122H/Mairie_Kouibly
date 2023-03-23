{{-- <header class="header2">

    <div id="header-sticky" class="meta-header-area">
        <div class="container-fluid">
            <div class="meta-header-inner">
                <div class="meta-header-left">
                    <div class="header-logo header2-logo">
                        <a href="{{ route('front') }}" class="logo-w"><img src="{{ asset('assets/media_fronan/logo_fronan.png') }}" alt="logo-img"></a>
                    </div>
                </div>
                <div class="meta-header-right">
                    <div class="meta-items meta-header-meta-items d-none d-lg-inline-flex">
                        <div class="meta-item">
                            <div class="meta-item-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="meta-item-content">
                            <p>Téléphone</p>
                            <div class="meta-title">+225 (01 02 64 46 44)</div>
                            </div>
                        </div>
                        <div class="meta-item d-none d-xl-inline-flex">
                            <div class="meta-item-icon">
                            <i class="fas fa-envelope-open"></i>
                            </div>
                            <div class="meta-item-content">
                            <p><a href="" class="__cf_email__" >[Addresse Email]</a></p>
                            <div class="meta-title">thio.gustave@gmail.com </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-menu main-menu2">
                        <nav id="mobile-menu-sticky">
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('front') }}">
                                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="menu-item-has-children"><a href="#">La mairie +</a>
                                    <ul class="sub-menu">
                                    <li><a href="{{ route('history')}}">Cabinet du maire</a></li>
                                    <li><a href="{{ route('municipalite')}}">La municipalité</a></li>
                                    <li><a href="{{ route('advisers')}}">Les conseillers</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="#">Services +</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('secretariat_general') }}">Sécrétariat général</a></li>
                                        <li><a href="{{ route('administratif_financier') }}">Administratif </a></li>
                                        <li><a href="{{ route('financier_front') }}">Financier </a></li>
                                        <li><a href="{{ route('technique_front') }}">Technique </a></li>
                                        <li><a href="{{ route('socio_front') }}">Socio culturel et de promotion humain </a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="{{ route('news') }}">Actualités</a></li>

                                <li class="menu-item-has-children"><a href="{{ route('decouverte_front') }}">Découverte</a></li>

                                <li class="menu-item-has-children"><a href="{{ route('agenda_front') }}">Agenda</a></li>

                                <li class="menu-item-has-children"><a href="{{ route('presse_front') }}">Presse</a></li>

                                <li class="menu-item-has-children"><a href="#">Documents Administratifs +</a>
                                    <ul class="sub-menu">
                                        @if ($liste_documents)
                                            @foreach ($liste_documents as $liste_doc)
                                                <li><a href="{{ route('demande_documents', $liste_doc->rfk) }}">{{ $liste_doc->name }}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="{{ route('verify_demande') }}">Suivre ma demande</a></li>
                            </ul>
                        </nav>
                    </div>

                    <a href="#" class="border-btn-rounded d-none d-lg-inline-flex">
                        <i class="fal fa-user"></i>
                        <span>Mon espace</span>
                    </a>
                    <div class="menu-bar d-lg-none">
                        <a class="side-toggle" href="javascript:void(0)">
                            <div class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main header-main2 d-none d-lg-block">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="header-main-content-wrapper">
                        <div class="header-main-left header-main-left-header2">
                            <div class="main-menu main-menu2 d-none d-lg-inline-block">
                                <nav id="mobile-menu2">
                                    <ul>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('front') }}">
                                                <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </li>

                                        <li class="menu-item-has-children"><a href="#">La mairie +</a>
                                            <ul class="sub-menu">
                                            <li><a href="{{ route('history') }}">Cabinet du maire</a></li>
                                            <li><a href="{{ route('municipalite') }}">La municipalité</a></li>
                                            <li><a href="{{ route('advisers') }}">Les conseillers</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children"><a href="#">Services +</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('secretariat_general') }}">Sécrétariat général</a></li>
                                                <li><a href="{{ route('administratif_financier') }}">Administratif </a></li>
                                                <li><a href="{{ route('financier_front') }}">Financier </a></li>
                                                <li><a href="{{ route('technique_front') }}">Technique </a></li>
                                                <li><a href="{{ route('socio_front') }}">Socio culturel et de promotion humain </a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children"><a href="{{ route('decouverte_front') }}">Découverte</a></li>

                                        <li class="menu-item-has-children"><a href="{{ route('news') }}">Actualités</a></li>

                                        <li class="menu-item-has-children"><a href="{{ route('agenda_front') }}">Agenda</a></li>

                                        <li class="menu-item-has-children"><a href="{{ route('presse_front') }}">Presse</a></li>

                                        <li class="menu-item-has-children"><a href="#">Documents Administratifs +</a>
                                            <ul class="sub-menu">
                                                @if ($liste_documents)
                                                    @foreach ($liste_documents as $liste_doc)
                                                        <li><a href="{{ route('demande_documents', $liste_doc->rfk) }}">{{ $liste_doc->name }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children"><a href="{{ route('verify_demande') }}">Suivre ma demande</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> --}}




    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-white">
                <span>
                    Suivez-nous:</span>
                <a class="btn btn-link text-light" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href="#"><i class="fab fa-twitter"></i></a>

            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Appelez-nous:</span>
                <span class="fs-5 fw-bold">+225 07 672 379 99
                </span>
            </div>
        </div>
    </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
    <a href="{{ route('front') }}" class="navbar-brand ps-5 me-0">
        <img src="{{ asset('front/img/logo_kouibly.jpeg') }}" style="border-radius: 10px;" width="70" alt="" srcset="">
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">La mairie</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('history')}}" class="dropdown-item">Cabinet du maire</a>
                    <a href="{{ route('municipalite')}}" class="dropdown-item">Munispalité</a>
                    <a href="{{ route('advisers')}}" class="dropdown-item">Les conseilés</a>

                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Service</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('secretariat_general') }}"  class="dropdown-item">Secretariat general</a>
                    <a href="{{ route('administratif_financier') }}" class="dropdown-item">Administratif financier</a>
                    <a href="{{ route('technique_front') }}" class="dropdown-item">Technique</a>

                </div>
            </div>

            <a href="#" class="nav-item nav-link">Actualités</a>
            <a href="#" class="nav-item nav-link">Kouibly TV</a>
            <a href="#" class="nav-item nav-link">Agenda</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Documents administratifs</a>
                <div class="dropdown-menu bg-light m-0">
                    @if ($liste_documents)
                        @foreach ($liste_documents as $liste_doc)
                            <a href="{{ route('demande_documents', $liste_doc->rfk) }}">{{ $liste_doc->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
            <a href="#" class="nav-item nav-link">Contacts</a>
        </div>
        <a href="#" class="btn btn-primary px-3 d-none d-lg-block">
            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
        </a>
    </div>
    </nav>
    <!-- Navbar End -->
