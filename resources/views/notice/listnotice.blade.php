@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Noticias</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Elaboro</th>
                            <th>Duración</th>
                            <th>Autorizada</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notices as $notice)
                        <tr>
                            <td>{{ $notice->title  }}</td>
                            <td>{{ $notice->users->name." ".$notice->users->paterno." ".$notice->users->materno }}</td>
                            <td>{{ date("d-m-Y", strtotime($notice->start_date_publication))." - ".date("d-m-Y", strtotime($notice->end_date_publication)) }}</td>
                            <td></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning btn-sm" title="Editar Noticia"><i class="fa fa-pencil-square-o"></i></a>
                                    <a class="btn btn-danger btn-sm" title="Eliminar Noticia"><i class="fa fa-remove"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection