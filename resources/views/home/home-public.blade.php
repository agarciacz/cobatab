@extends('layouts.plantilla-public')

@section('titulo', 'Home')

@section('contenido')

    <section class="x-services ptb-100 " style="padding-bottom: 0px!important;">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @php
                    $i = 0;
                    $id = 0;
                @endphp
                @foreach($carousels as $carousel)
                    <li data-target="#carousel-example-generic"
                        data-slide-to="@php echo $i++; @endphp"
                        id="@php echo "indicador".$id++; @endphp"
                        class="">
                    </li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @php
                    $iditem = 0;
                @endphp
                @foreach($carousels as $carousel)
                    <div id="@php echo "item".$iditem++; @endphp" class="item">
                        @if(Storage::disk('carousel')->has($carousel->image))
                            <img src="{{ route('image_carousel', ['filename' => $carousel->image])}}"
                                 alt="{{ $carousel->title }}.">
                        @endif
                        <div class="carousel-caption">
                            <h1 id="title">{{ $carousel->title }}</h1>
                            <h2>{{ $carousel->description }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="x-services ptb-100 gray-bg">
        <div id="pleca">
            <div class="container">
                <div class="slogan">
                    <i class="fa fa-quote-left"></i>
                    <em>Toda profesión, tiene un gran inicio.</em>
                    <i class="fa fa-quote-right"></i></div>
            </div>
        </div>
    </section>

    <section class="x-services ptb-100">

        <section class="section-title">
            <div class="container text-center">
                <h2>Noticias recientes</h2>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <div class="row">
                @foreach($notices as $notice)
                    <div class="col-md-3">
                        <div class="thumbnail clearfix">
                            @if(Storage::disk('images_notices')->has($notice->authorized->cover_image))
                                <a href="{{ route('view_notice_cobatab', ['notice' => $notice->authorized->title])  }}">
                                    <img class="img-responsive image-center img-thumbnail images-notices"
                                         src="{{ route('imagesnotices', ['filename' => $notice->authorized->cover_image ])}}"
                                         alt="Image">
                                </a>
                            @endif
                            <div class="caption">
                                <h3>
                                    <a href="{{ route('view_notice_cobatab', ['notice' => $notice->authorized->title])  }}">{{$notice->authorized->title}}</a>
                                </h3>
                                <p>{{$notice->authorized->subtitle}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- .container -->
    </section>
    <section class="x-services ptb-100 gray-bg">
        <section class="section-title">
            <div class="container text-center">
                <h2>SECCIONES DE INTERÉS</h2>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item">
                        <div class="icon1">
                            <a href="/sitio/conocenos/oferta/index.html"><i class="fa fa-graduation-cap fa-flip-horizontal"></i></a>
                        </div>
                        <h4>oferta educativa</h4>
                        <p>Conoce nuestra oferta educativa.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item">
                        <div class="icon1">
                            <a href="/sitio/planteles/index.html"><i class="fa fa-map-marker"></i></a>
                        </div>
                        <h4>ubica tu plantel</h4>
                        <p>Obten datos de contacto, imágenes y  ubicación de tu plantel.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item">
                        <div class="icon1">
                            <a href="/sitio/multimedia/index.html"><i class="fa fa-picture-o fa-flip-horizontal"></i></a>
                        </div>
                        <h4>multimedia</h4>
                        <p>Nuestra galería de videos e Imágenes de nuestros eventos.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item">
                        <div class="icon1">
                            <a href="#"><i class="fa fa-user"></i></a>
                        </div>
                        <h4>Becas</h4>
                        <p>Conoce las becas que puedes obtener.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="x-services ptb-100 ">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="section-title">
                        <div class="text-center">
                            <h2>Eventos y Convocatorias</h2>
                        </div>
                    </section>
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Deporte</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Matematicas</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Cívica</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Cultural</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages">...</div>
                            <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="x-services ptb-100 gray-bg">
        <section class="section-title">
            <div class="container text-center">
                <h2>Calendario escolar</h2>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('img/calendario2018-2019.jpg') }}" class="img-responsive"
                         alt="Calendario Escolar">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scrips')
    <script>
        $(document).ready(function () {
            $("#indicador0").addClass('active');
            $("#item0").addClass('active');
        });
    </script>
@endsection