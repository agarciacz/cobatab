@extends('layouts.plantilla-public')

@section('titulo', 'Home')

@section('contenido')
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