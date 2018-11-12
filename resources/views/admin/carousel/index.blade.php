@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Carousel</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carousels as $carousel)
                                <tr>
                                    <td>
                                        @if(Storage::disk('carousel')->has($carousel->image))
                                            <img class="img-responsive image-center img-thumbnail" height="80px" width="150"
                                                 src="{{ route('image_carousel', ['filename' => $carousel->image])}}">
                                        @endif
                                    </td>
                                    <td>{{ $carousel->title  }}</td>
                                    <td>{{ $carousel->description}}</td>
                                    @if($carousel->is_active == 1)
                                        <td><span class="label label-success">Activo</span></td>
                                    @elseif($carousel->is_active == 0)
                                        <td><span class="label label-danger">No activo</span></td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('view_update_carousel', ['id' => $carousel->id]) }}" class="btn btn-warning btn-sm" title="Editar Carousel">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Eliminar Carousel">
                                                <i class="fa fa-remove"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
