@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Actualizar Noticia</h3>
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
                    <form method="post" action="{{ route('form_created_notice') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="title">{{ __('Titulo de la noticia') }}</label>
                                    <input id="title" name="title"
                                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ old('title') }}" autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitle">{{ __('Subtitulo de la noticia') }}</label>
                                    <input id="subtitle" name="subtitle"
                                           class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}"
                                           value="{{ old('subtitle') }}" autofocus>
                                    @if ($errors->has('subtitle'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subtitle') }}</strong>
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
                                              autofocus>{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date_publication">{{ __('Inicio de publicación') }}</label>
                                    <input id="start_date_publication" name="start_date_publication" type="date"
                                           class="form-control {{ $errors->has('start_date_publication') ? ' is-invalid' : '' }}"
                                           value="{{ old('start_date_publication') }}" autofocus>
                                    @if ($errors->has('start_date_publication'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('start_date_publication') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date_publication">{{ __('Fin de la publicación') }}</label>
                                    <input id="end_date_publication" name="end_date_publication" type="date"
                                           class="form-control {{ $errors->has('end_date_publication') ? ' is-invalid' : '' }}"
                                           value="{{ old('end_date_publication') }}" autofocus>
                                    @if ($errors->has('end_date_publication'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('end_date_publication') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cover_image">{{ __('Imagen de Portada') }}</label>
                                    <input id="cover_image" name="cover_image" type="file">
                                    @if ($errors->has('cover_image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cover_image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">{{ __('Galeria de Imagenes') }}</label>
                                    <input id="image" name="image[]" type="file" multiple>
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