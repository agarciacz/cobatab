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
                                           value="{{ $notice->title  }}" autofocus>
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
                                           value="{{ $notice->subtitle }}" autofocus>
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
                                              autofocus>{{$notice->description}}</textarea>
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
                                           value="{{ $notice->start_date_publication }}" autofocus>
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
                                           value="{{ $notice->end_date_publication }}" autofocus>
                                    @if ($errors->has('end_date_publication'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('end_date_publication') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr></hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="cover_image">{{ __('Imagen de Portada') }}</label>
                                @if(Storage::disk('images_notices')->has($notice->cover_image))
                                    <img class="img-responsive image-center img-thumbnail"
                                         src="{{ route('imagesnotices', ['filename' => $notice->cover_image ])}}">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cover_image">Actualizar Imagen de Portada</label>
                                    <input id="cover_image" name="cover_image" type="file">
                                    @if ($errors->has('cover_image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cover_image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="image">{{ __('Galeria de Imagenes') }}</label>
                                <div class="row">
                                    @foreach($images as $image)
                                        @if(Storage::disk('images_notices')->has($image->image))
                                            <div class="col-md-2">
                                                <div class="box box-primary direct-chat direct-chat-primary">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title"></h3>
                                                        <div class="box-tools pull-right">
                                                            <button type="button" class="btn btn-box-tool"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-confirm-delete-image-{{$image->id}}">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body">
                                                        <img class="img-responsive img-thumbnail images-authorized"
                                                             src="{{ route('imagesnotices', ['filename' => $image->image ])}}">
                                                        <p>{{ $image->image }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal modal-danger fade" id="modal-confirm-delete-image-{{$image->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Eliminar imagen</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Esta seguro de eliminar la imagen {{ $image->image }}
                                                                ?</p>
                                                            <input id="url-delete-image" type="hidden" value="{{ route('delete-image-gallery', ['id' => $image->id]) }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left"
                                                                    data-dismiss="modal">Cerrar
                                                            </button>
                                                            <button id="btn-confirm" onclick="selectImage( '{{$image->id}}' )"
                                                                    type="button" class="btn btn-outline">Confirmar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Final del modal-->
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">{{ __('Actualizar Galeria de Imagenes') }}</label>
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
@section('scrips')
    <script>
        $(document).ready(function () {

        });

        function selectImage(id) {
            var url = $('#url-delete-image').val();
            var key = id;
            $.ajax({
                url: url,
                type: 'GET',
                data: 'id='+key,
                headers: {'X-CSRFToken': $('meta[name="token"]').attr('content')},
                success: function (datos) {
                    location.reload();
                }
            });
        }

    </script>
@endsection