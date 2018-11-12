@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-3 col-md-offset-2">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Imagén actual</h3>
                </div>
                <div class="box-body">
                    @if(Storage::disk('carousel')->has($carousel->image))
                        <img class="img-responsive image-center img-thumbnail"
                             src="{{ route('image_carousel', ['filename' => $carousel->image ])}}">
                    @endif
                </div>
            </div>
        </section>
        <section class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Actualizar Carousel</h3>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('form_update_carousel', ['id'=>$carousel->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Titulo de la noticia') }}</label>
                                    <input id="title" name="title"
                                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ $carousel->title }}" autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ __('Descripción de la noticia') }}</label>
                                    <textarea id="description" name="description"
                                              class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              autofocus>{{ $carousel->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="is_active">{{ __('Status') }}</label>
                                    <div class="checkbox">
                                        <label>
                                            @switch($carousel->is_active)
                                                @case(0)
                                                <input id="is_active" name="is_active" type="checkbox"
                                                       value="1"
                                                       class="{{ $errors->has('is_active') ? ' is-invalid' : '' }}"> Activar
                                                    @break
                                                @case(1)
                                                <input id="is_active" name="is_active" type="checkbox"
                                                       value="1" checked
                                                       class="{{ $errors->has('is_active') ? ' is-invalid' : '' }}"> Activar
                                                    @break
                                            @endswitch
                                        </label>
                                        @if ($errors->has('is_active'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('is_active') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">{{ __('Imagen') }}</label>
                                    <input id="image" name="image" type="file">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-save"></i> </span>Guardar
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection