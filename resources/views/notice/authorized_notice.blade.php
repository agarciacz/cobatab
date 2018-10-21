@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Autorizar noticia</h3>
                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('form_authorized_notice') }}">
                        @csrf
                        <input type="text" name="notice" id="notice" value="{{ $notice->id }}">
                        <label class="radio-inline">
                            <input type="radio" name="is_authorized" id="is_authorized" value="1"> Aprobada
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_authorized" id="is_authorized" value="0"> No aprovada
                        </label>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div class="row">
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-newspaper-o"></i> {{ $notice->title }}
                        <small class="pull-right">
                        </small>
                    </h2>
                </div>
            <!-- /.col -->
            </div>
        <!-- info row -->
            <div class="row invoice-info">
            <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    <address>
                        <strong>Subtitulo</strong><br>
                        {{ $notice->subtitle }}<br>
                        <strong>Duración de la noticia</strong><br>
                        {{ date("d-m-Y", strtotime($notice->start_date_publication))." - ".date("d-m-Y", strtotime($notice->end_date_publication)) }}
                    </address>
                </div>
            <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    <address>
                        <strong>Noticia creada y redactada por</strong><br>
                        {{ $notice->users->name." ".$notice->users->paterno." ".$notice->users->materno }}<br>
                        <strong>Fecha de creación:</strong> {{ date('d-m-Y | h:i A', strtotime($notice->created_at)) }}<br>
                        <strong>Ultima Modificación:</strong> {{ date('d-m-Y | h:i A', strtotime($notice->updated_at)) }}<br>
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <hr>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <strong>Descripción de la noticia</strong><br>
                    {{$notice->description}}
                </div>
            </div>
            <hr>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <strong>Foto de portada</strong><br>
                    @if(Storage::disk('images_notices')->has($notice->cover_image))
                        <img class="img-responsive image-center img-thumbnail"
                             src="{{ route('imagesnotices', ['filename' => $notice->cover_image ])}}">
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <strong>Imagenes</strong>
                    @foreach($images as $image)
                        @if(Storage::disk('images_notices')->has($image->image))
                            <div class="text-center">
                                <img class="img-responsive img-thumbnail images-authorized"
                                     src="{{ route('imagesnotices', ['filename' => $image->image ])}}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection