@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuarios</h3>
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
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->user }}</td>
                                    <td>{{ $user->name." ".$user->paterno." ".$user->materno }}</td>
                                    <td>{{ $user->email}}</td>
                                    @switch($user->category)
                                        @case('A')
                                        <td> Administrador </td>
                                        @break
                                        @case('D')
                                        <td> Director </td>
                                        @break
                                        @case('S')
                                        <td> Subdirector</td>
                                        @break
                                    @endswitch
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-warning btn-sm" title="Editar Usuario">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Eliminar Usuario">
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