@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Noticias</h3>
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
                                <th>Titulo</th>
                                <th>Elaboro</th>
                                <th>Duración</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notices as $notice)
                                <tr>
                                    <td>{{ $notice->title  }}</td>
                                    <td>{{ $notice->users->name." ".$notice->users->paterno." ".$notice->users->materno }}</td>
                                    <td>{{ date("d-m-Y", strtotime($notice->start_date_publication))." - ".date("d-m-Y", strtotime($notice->end_date_publication)) }}</td>
                                    @if( isset($notice->notice_is_authorized->is_authorized ) )
                                        @if($notice->notice_is_authorized->is_authorized == 1)
                                            <td><span class="label label-success">Autorizada</span></td>
                                        @elseif($notice->notice_is_authorized->is_authorized == 0)
                                            <td><span class="label label-danger">No autorizada</span></td>
                                        @endif
                                    @elseif( !isset($notice->notice_is_authorized->is_authorized ))
                                        <td><span class="label label-warning">Pendiente</span></td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('view_update_notice', ['notice' => $notice->title]) }}" class="btn btn-warning btn-sm" title="Editar Noticia">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Eliminar Noticia"><i
                                                        class="fa fa-remove"></i></a>
                                            <a href="{{ route('view_authorized_notice', ['notice' => $notice->title]) }}"
                                               class="btn btn-primary btn-sm" title="Permiso de la Noticia"><i
                                                        class="fa fa-shield"></i></a>
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
