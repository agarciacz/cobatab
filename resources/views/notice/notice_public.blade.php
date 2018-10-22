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
                        <img class="img-responsive image-center img-thumbnail"
                             src="{{ route('imagesnotices', ['filename' => $notice->authorized->cover_image ])}}"
                             alt="Image">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{{ $notice->description }}</p>
                </div>
            </div>
        </div>

    </section>
@endsection