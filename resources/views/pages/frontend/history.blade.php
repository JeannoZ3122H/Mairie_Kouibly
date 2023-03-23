@extends('layouts.front_master')

@section('content')

    <!-- page title area start  -->
    <section class="page-title-area" style=" background-image: url('{{ asset('front/img/lemaire.jpg')}}') ">
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper">
                        <h1 class="page-title mb-10">Le maire</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="breadcrumb-menu">
                    <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items">
                        <li class="trail-item trail-begin"><a href="{{ route('front') }}"><span>Accueil</span></a></li>
                        <li class="trail-item trail-end"><span>Le maire</span></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- page title area end  -->

    <!--====== CONTACT MASSAGE PART START ======-->

    <section class="contact-massage-area pt-130 pb-130">
        <div class=" card container">
            <div class=" row">
                <div class=" card-body col-lg-12">
                    <div class="row ">
                        <div class="col-lg-6">
                            <img src="{{ $maire[0]['image'] }}" alt="" sizes="" srcset="">
                        </div>
                        <div class="col-lg-6">
                            <h1 class="title">M. Thio Disso Gustave</h1>
                            <p class="title"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ab quasi beatae illum nostrum ipsam. Mollitia, hic ipsum pariatur iure ipsa rem, explicabo similique odit voluptate doloribus deleniti necessitatibus eaque.</p>
                        </div>
                    </div>
                    <div class="well">
                        <br>

                        <p>
                            {!! $maire[0]['description'] !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
