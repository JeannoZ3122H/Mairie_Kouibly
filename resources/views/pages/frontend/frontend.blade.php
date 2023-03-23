@extends('layouts.front_master')


@section('content')
    {{-- <main>
        <!-- side toggle start -->
        <div class="fix">
            <div class="side-info">
                <div class="side-info-content">
                <div class="offset-widget offset-logo mb-40">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <a href="index.html">
                            <img src="assets/img/logo/logo-bl.png" alt="Logo">
                            </a>
                        </div>
                        <div class="col-3 text-end"><button class="side-info-close"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu2 d-xl-none fix"></div>
                <div class="offset-widget offset_searchbar mb-30">
                    <form action="#" class="filter-search-input">
                        <input type="text" placeholder="Search keyword">
                        <button type="submit"><i class="fal fa-search"></i></button>
                    </form>
                </div>
                <div class="offset-widget offset-support mb-30">
                    <div class="footer-support">
                        <div class="irc-item support-meta">
                            <div class="irc-item-icon">
                            <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="irc-item-content">
                            <p>Emergency Call</p>
                            <div class="support-number"><a href="tel:98965963168">989 659 631 68</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-widget offset-social mb-30">
                    <div class="footer-social">
                        <span>Connect:</span>
                        <div class="social-links">
                            <ul>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-overlay"></div>
        <div class="offcanvas-overlay-white"></div>

        <div class="fix">
            <div class="sidebar-action sidebar-cart">
                <button class="close-sidebar">Close<i class="fal fa-times"></i></button>
                <h4 class="sidebar-action-title">Shopping Cart</h4>
                <div class="sidebar-action-list">
                <div class="sidebar-list-item">
                    <div class="product-image pos-rel">
                        <a href="shop-details.html" class=""><img src="assets/img/product/product-6.png" alt="img"></a>
                    </div>
                    <div class="product-desc">
                        <div class="product-name"><a href="shop-details.html">Giardino Tools</a></div>
                        <div class="product-pricing">
                            <span class="item-number">1 ×</span>
                            <span class="price-now">$24.00</span>
                        </div>
                        <button class="remove-item"><i class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="sidebar-list-item">
                    <div class="product-image pos-rel">
                        <a href="shop-details.html" class=""><img src="assets/img/product/product-8.png" alt="img"></a>
                    </div>
                    <div class="product-desc">
                        <div class="product-name"><a href="shop-details.html">Bloom Season</a></div>
                        <div class="product-pricing">
                            <span class="item-number">1 ×</span>
                            <span class="price-now">$12.00</span>
                        </div>
                        <button class="remove-item"><i class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="sidebar-list-item">
                    <div class="product-image pos-rel">
                        <a href="shop-details.html" class=""><img src="assets/img/product/product-10.png" alt="img"></a>
                    </div>
                    <div class="product-desc">
                        <div class="product-name"><a href="shop-details.html">the best dirt</a></div>
                        <div class="product-pricing">
                            <span class="item-number">1 ×</span>
                            <span class="price-now">$42.00</span>
                        </div>
                        <button class="remove-item"><i class="fal fa-times"></i></button>
                    </div>
                </div>

                </div>
                <div class="product-price-total">
                <span>Subtotal :</span>
                <span class="subtotal-price">$78.00</span>
                </div>
                <div class="sidebar-action-btn">
                <a href="cart.html" class="fill-btn">View cart</a>
                <a href="checkout.html" class="border-btn">Checkout</a>
                </div>
            </div>
        </div>
        <!-- side toggle end -->

        <!-- banner area start  -->
        <div class="banner-area banner-area2 pos-rel">
            <div class="swiper-container slider__active">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="single-banner single-banner-2 banner-850 d-flex align-items-center pos-rel">
                        <div class="banner-bg banner-bg2 banner-bg2-1" data-background="assets/media_fronan/fronan.jpg">
                        </div>
                        <div class="container pos-rel">
                            <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="banner-content banner-content2 banner-content2-1">

                                    <h1 class="banner-title" data-animation="fadeInUp" data-delay=".5s">hôtel communal
                                        de fronan</h1>

                                    <div class="banner-btn" data-animation="fadeInUp" data-delay=".9s">

                                        <a href="{{ route('document_admin_front') }}" class="fill-btn-rounded">Documents Administratifs<i
                                            class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="single-banner single-banner-2 banner-850 d-flex align-items-center pos-rel">
                        <div class="banner-bg banner-bg2 banner-bg2-1" data-background="assets/img/banner/banner-4-1.jpg">
                        </div>
                        <div class="container pos-rel">
                            <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="banner-content banner-content2 banner-content2-1">
                                    <div class="banner-meta-text" data-animation="fadeInUp" data-delay=".3s">
                                        <span>[ since from 2000 ]</span>
                                    </div>
                                    <h1 class="banner-title" data-animation="fadeInUp" data-delay=".5s">k.i Flower
                                        plants</h1>
                                    <div class="banner-text" data-animation="fadeInUp" data-delay=".7s">
                                        <p>The laying out and care of a plot of ground devoted partially or
                                        wholly to the growing of plants such as flowers.</p>
                                    </div>
                                    <div class="banner-btn" data-animation="fadeInUp" data-delay=".9s">
                                        <div class="banner-meta-review">
                                        <div class="meta-review-thumb">
                                            <img src="assets/img/banner/meta-review-thumb.png" alt="">
                                        </div>
                                        <div class="meta-review-text">
                                            <span>3200+</span>
                                            Active Review
                                        </div>
                                        </div>
                                        <a href="contact.html" class="fill-btn-rounded">Documents Administratifs<i
                                            class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="single-banner single-banner-2 banner-850 d-flex align-items-center pos-rel">
                        <div class="banner-bg banner-bg2 banner-bg2-1" data-background="assets/img/banner/banner-1-1.jpg">
                        </div>
                        <div class="container pos-rel">
                            <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="banner-content banner-content2 banner-content2-1">
                                    <div class="banner-meta-text" data-animation="fadeInUp" data-delay=".3s">
                                        <span>[ since from 2000 ]</span>
                                    </div>
                                    <h1 class="banner-title" data-animation="fadeInUp" data-delay=".5s">make dream
                                        gardening</h1>
                                    <div class="banner-text" data-animation="fadeInUp" data-delay=".7s">
                                        <p>The laying out and care of a plot of ground devoted partially or
                                        wholly to the growing of plants such as flowers.</p>
                                    </div>
                                    <div class="banner-btn" data-animation="fadeInUp" data-delay=".9s">
                                        <div class="banner-meta-review">
                                        <div class="meta-review-thumb">
                                            <img src="assets/img/banner/meta-review-thumb.png" alt="">
                                        </div>
                                        <div class="meta-review-text">
                                            <span>3200+</span>
                                            Active Review
                                        </div>
                                        </div>
                                        <a href="contact.html" class="fill-btn-rounded">Documents Administratifs<i
                                            class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="slider-nav d-none">
                <div class="slider-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                <div class="slider-button-next"><i class="fal fa-long-arrow-right"></i></div>
                </div>
            </div>
            <div class="slider-pagination slider2-pagination d-none"></div>
        </div>
        <!-- banner area end  -->

        <!-- faq area start  -->
        <div class="faq-area style-3 pt-120 pb-60">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay=".3s">
                    @if (isset($biographies))
                        @foreach ($biographies as $items)
                            <div class="col-lg-6">
                                <div class="faq-img mb-60">
                                    <img src="{{ $items->image }}" alt="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="section-title style-2">
                                    <span class="section-subtitle">[ {{ $items->titre }} ]</span>
                                    <h2 class="section-main-title mb-20">{{ $items->nom }}</h2>
                                </div>
                                <div class="faq-wrapper mb-60">
                                    <div class="gm-faq">
                                        <div class="accordion" id="accordionExample-st-2">
                                        <div class="gm-faq-group">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne-st-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne-st-2" aria-expanded="false"
                                                    aria-controls="collapseOne-st-2">
                                                    {{ $items->titre }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne-st-2" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne-st-2" data-bs-parent="#accordionExample-st-2">
                                                    <div class="accordion-body">
                                                    {!! $items->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- faq area end  -->


        <!-- services area start  -->
        <section class="services-area pt-120 pb-60">
            <div class="services-title-bg">
                <img src="{{ asset('assets/media_fronan/fronan_bg.jpg') }}" alt="">
            </div>

            <div class="container">
                <div class="row justify-content-center wow fadeInUp" data-wow-delay=".3s">
                    <div class="col-lg-8">
                        <div class="section-title style-2 text-center services-title-style-2">
                            <span class="section-subtitle">[ Actualités récentes ]</span>
                            <h2 class="section-main-title mb-45">Activités</h2>
                        </div>
                    </div>
                </div>
                <div class="services-wrapper pb-10 wow fadeInUp" data-wow-delay=".3s">
                    <div class="row">
                        @if (isset($news))
                            @foreach ($news as $items)
                                <div class="col-lg-4 col-md-6">
                                    <div class="blog-single style-2 mb-45">
                                        <div class="blog-thumb">
                                        <a href="{{ route('show_details', $items->id) }}"><img src="{{ $items->image }}" alt=""></a>
                                        </div>
                                        <div class="blog-content">
                                        <div class="blog-meta-list">
                                            <div class="blog-meta-single">
                                                <div class="blog-meta-text">
                                                    <div class="blog-date">{{date("d-m-Y H:i", strtotime($items->created_at))  }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="blog-title"><a href="{{ route('show_details', $items->id) }}">{{ $items->titre }}</a></h2>
                                        <div class="blog-btn">
                                            <a href="{{ route('news') }}" class="text-btn"><i class="fal fa-long-arrow-right"></i>Voir plus<i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- services area end  -->


        <!-- contact area start  -->
        <section class="contact-area pt-120">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-12">
                    <div class="contact-wrapper">
                        <div class="contact-wrapper-content">
                            <div class="section-title">
                            <h2 class="section-main-title mb-35">Laisser un message</h2>
                            </div>
                            <div class="contact-form">
                            <form action="{{ route('add_contact') }}" method="POST">

                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="single-input-field field-name">
                                        <input type="text" name="full_name" placeholder="Entrer votre nom complet">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="single-input-field field-email">
                                        <input type="text" name="email" placeholder="Votre adresse email">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="single-input-field field-message">
                                        <textarea name="message" id="message" placeholder="message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="main-btn">Envoyer <i class="far fa-plus"></i></button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="contact-wrapper-img">
                            <img src="{{ asset('assets/media_fronan/img_fronan.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- contact area end  -->

        <!-- contact info area start  -->
        <section class="contact-info-area">

            <div class="container">
                <div class="row justify-content-center wow fadeInUp" data-wow-delay=".3s">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h2 class="section-main-title mb-45">Contact</h2>
                        </div>
                    </div>
                </div>

                <div class="row wow fadeInUp" data-wow-delay=".3s">
                    <div class="col-lg-4">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.8877489192105!2d-5.127661684766225!3d8.214042603479921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfb7d96baf8379ad%3A0x19b9ec1b302432a6!2sMairie%20de%20fronan!5e0!3m2!1sfr!2sci!4v1663586722455!5m2!1sfr!2sci" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="info-item-wrapper info-wrapper-media">
                            <h4 class="contact-info-title">Mairie de fronan</h4>
                            <div class="info-contact">
                                <ul>
                                <li>
                                    <div class="single-contact">
                                        <div class="contact-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <p><a href="+255 (01 01 28 45 90)">+225 (01 02 64 46 44)</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-contact">
                                        <div class="contact-icon">
                                            <i class="fas fa-envelope-open"></i>
                                        </div>
                                        <p><a href="#"><span class="__cf_email__">[thio.gustave@gmail.com]</span></a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-contact">
                                        <div class="contact-icon">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <p><a href="#">Ville située au centre Nord de la côte d'ivoire à 7 km de katiola et à près de 414 km d'Abidjan</a></p>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="info-item-wrapper info-wrapper-time">
                            <h4 class="contact-info-title">Horaires d'ouvertures </h4>
                            <div class="info-contact-time">
                                <ul>
                                <li>
                                    <div class="info-date">
                                        <span>Lundi</span>
                                        <span>08h à 16h</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-date">
                                        <span>Mardi</span>
                                        <span>08h à 16h</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-date">
                                        <span>Mercredi</span>
                                        <span>08h à 16h</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="info-date">
                                        <span>Jeudi</span>
                                        <span>08h à 16h</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="info-date">
                                        <span>Vendredi</span>
                                        <span>08h à 16h</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="info-date">
                                        <span>Samedi - Dimanche</span>
                                        <span>Fermée</span>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact info area end  -->
    </main> --}}

    <main>
            <!-- Carousel Start -->
    <div class="container-fluid mt-2 px-1">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('front/img/slide.jpg') }}" alt="Image">
                </div>
                <div class="carousel-item ">
                    <img class="w-100" src="{{ asset('front/img/slide1.jpg') }}" alt="Image">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row gx-lg-0 gy-4">
                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="bi bi-files"></i>
                            <div>
                                <h2>Etat civil</h2>
                                <p>Demande de document </p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">

                        <div class="info-item d-flex">
                            <i class="bi bi-cash-stack"></i>
                            <div>
                                <h2>Investir à Kouibly</h2>
                                <p>Educations, santés, transports, BTP</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="bi bi-link"></i>
                            <div>
                                <h2>Adresses utiles</h2>
                                <p>Hotels, Restaurants, Pharmacies, etc</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- About Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <img class="img-fluid" src="{{ asset('front/img/maire.png') }}" height="500">
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Le maire</p>
                    <h1 class="display-5 mb-4">ZAE Gnondjouowi Alexis</h1>
                    <p class="mb-4">
                        Kouibly est une localité située à l'ouest de la Côte d'Ivoire, dans la Région des Dix-Huit Montagnes. La localité de Kouibly est un chef-lieu de commune, de sous-préfecture et de département.
                        </p>
                    <div class="d-flex align-items-center mb-2 mt-4">
                        <div class="flex-shrink-0 bg-primary p-4">
                            <h1 class="display-2 text-white">5 ans</h1>
                            <h5 class="text-white">De travail</h5>
                        </div>
                        <div class="ms-4">
                            <p><i class="fa fa-check text-primary me-2"></i>Promotion de la paix</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Reconciliation</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Innovation</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Travail</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Actualités</p>
                <h1 class="display-5 mb-4">Actualités récentes</h1>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <img class="img-fluid" src="{{ asset('front/img/paix.jpg') }}" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="{{ asset('front/img/pax.jpg') }}" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Journée Nationale de la Paix</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">
                                    Le Maire Alexis Zae, Maire de la Commune de Kouibly et Conseiller Economique, Social, Environnemental et Culturel est présent en ce jour 15 novembre 2022 à la Cérémonie de la Journée Nationale de la Paix
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="#">Voir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <img class="img-fluid" src="{{ asset('front/img/paix.jpg') }}" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="{{ asset('front/img/pax.jpg') }}" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Mme le maire de la commune de Logoualé Jeannette BADOUEL fait un important don de riz </h3>
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Vue la pandémie du coronavirus qui fait ravage dans le monde ,soucieux de sa population Mme le maire de la commune de Logoualé Jeannette BADOUEL fait un important don de riz </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="#">Voir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <img class="img-fluid" src="{{ asset('front/img/paix.jpg') }}" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="{{ asset('front/img/pax.jpg') }}" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Construction de salle de classe pour le collège</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">4 classes pour le collège moderne de Kongasso qui sera bientôt un Lycée .Merci M.le Maire pour toujours</p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="#">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="container-fluid bg-dark pt-5 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Galerie</p>
            <h1 class="display-5 text-white mb-5">Galerie</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
            <a class="project-item" href="#">
                <img class="img-fluid" src="{{ asset('front/img/agenda.jpg') }}" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Galerie</h5>
                </div>
            </a>
            <a class="project-item" href="#">
                <img class="img-fluid" src="{{ asset('front/img/agenda1.jpg') }}" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Galerie</h5>
                </div>
            </a>
            <a class="project-item" href="#">
                <img class="img-fluid" src="{{ asset('front/img/agenda2.jpg') }}" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Galerie</h5>
                </div>
            </a>
            <a class="project-item" href="#">
                <img class="img-fluid" src="{{ asset('front/img/agenda3.jpg') }}" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Galerie</h5>
                </div>
            </a>
            <a class="project-item" href="#">
                <img class="img-fluid" src="{{ asset('front/img/agenda4.jpg') }}" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Galerie</h5>
                </div>
            </a>
            <a class="project-item" href="#">
                <img class="img-fluid" src="{{ asset('front/img/agenda5.jpg') }}" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Galerie</h5>
                </div>
            </a>
        </div>
    </div>
    <!-- Project End -->

    <section id="call-to-action" class="call-to-action">
        <div class="container-fluid text-center" data-aos="zoom-out">
            <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d63326.71235365137!2d-7.2333333333333!3d7.250000000000001!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMTUnMDAuMCJOIDfCsDE0JzAwLjAiVw!5e0!3m2!1sfr!2sci!4v1679413187894!5m2!1sfr!2sci" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    </main>
@endsection
