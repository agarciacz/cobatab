@extends('layouts.plantilla-public')

@section('titulo', 'Home')

@section('contenido')
    <section class="about-text ptb-100" style="margin-top: 15px">
        <section class="section-title">
            <div class="container text-center">
                <h2>{{ $notice->title }}</h2>
                <h3>{{ $notice->subtitle }}</h3>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Storage::disk('images_notices')->has($notice->authorized->cover_image))
                        <img class="img-responsive image-center img-thumbnail" height="350px" width="700px"
                             src="{{ route('imagesnotices', ['filename' => $notice->authorized->cover_image ])}}"
                             alt="Image">
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $notice->description }}</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Galeria de imagenes</h4>
                </div>
                <div class="col-md-12">
                    @foreach($images as $image)
                        @if(Storage::disk('images_notices')->has($image->image))
                            <div class="col-md-3">
                                <img class="img-responsive img-thumbnail images-authorized"
                                     src="{{ route('imagesnotices', ['filename' => $image->image ])}}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </section>
@endsection