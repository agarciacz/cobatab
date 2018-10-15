@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Noticia</h3>
                </div>
                <div class="box-body">
                    <div class="container">

                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Descripción de la noticia') }}</label>
                                        <textarea id="description" name="description"
                                                  class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                  autofocus>
                                            {{ old('description') }}
                                        </textarea>
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
                                        <label for="image">{{ __('Imagen') }}</label>
                                        <input id="title" name="title" type="file">
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><span><i class="fa fa-save"></i> </span>Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection