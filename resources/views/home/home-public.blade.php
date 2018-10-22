@extends('layouts.plantilla-public')

@section('titulo', 'Home')

@section('contenido')
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ asset('img/img4.jpg') }}" alt="...">
                <div class="carousel-caption">
                    <h1 id="title">Alumnos</h1>
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('img/img6.jpg') }}" alt="...">
                <div class="carousel-caption">
                    <h1 id="title">Maestros</h1>
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('img/img7.jpg') }}" alt="...">
                <div class="carousel-caption">
                    <h1 id="title">Libros</h1>
                    <h2>asdjasduiauisdi asdjasduiasuidasdasdasdasduhasdasdasasduisdbasdj
                        hiasdjhiasdjiasdjiasdhisdasdsdsdsdauisdaasduisdasaddd
                        dddddddddddddddddddddddddddddddddddddddui</h2>
                </div>
            </div>
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

    <section class="x-services ptb-100 gray-bg">

        <section class="section-title">
            <div class="container text-center">
                <h2>Noticias recientes</h2>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <div class="row">
                @foreach($notices as $notice)
                <div class="col-md-6">
                    <div class="thumbnail clearfix">
                        @if(Storage::disk('images_notices')->has($notice->authorized->cover_image))
                            <a href="#">
                                <img class="img-responsive image-center img-thumbnail" src="{{ route('imagesnotices', ['filename' => $notice->authorized->cover_image ])}}" alt="Image">
                            </a>
                        @endif

                        <div class="caption">
                            <h3><a href="#">{{$notice->authorized->title}}</a></h3>

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
                <h2>Calendario escolar</h2>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('img/calendario2018-2019.jpg') }}" class="img-responsive" alt="Calendario Escolar">
                </div>
            </div>
        </div>
    </section>


@endsection