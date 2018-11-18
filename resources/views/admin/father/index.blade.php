@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Padres</h3>
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
                                <th>CURP</th>
                                <th>Nombre del padre</th>
                                <th>Telefono Celular</th>
                                <th>Telefono de casa</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($fathers as $father)
                                <tr>
                                    <td>{{ $father->curp }}</td>
                                    <td>{{ $father->names." ".$father->paterno." ".$father->materno }}</td>
                                    <td>{{ $father->telephone1 }}</td>
                                    <td>{{ $father->telephone2 }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('view_update_father', ['curp' => $father->curp]) }}" class="btn btn-warning btn-sm" title="Editar Padre">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Eliminar Padre">
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