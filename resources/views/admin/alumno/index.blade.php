@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Alumnos</h3>
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
                                <th>Matricula</th>
                                <th>Alumno</th>
                                <th>Sexo</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->matricula }}</td>
                                    <td>{{ $student->names." ".$student->paterno." ".$student->materno }}</td>
                                    @switch($student->sex)
                                        @case('M')
                                        <td>Masculino</td>
                                        @break
                                        @case('F')
                                        <td>Femenino</td>
                                        @break
                                    @endswitch
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('information_student', ['matricula' => $student->matricula]) }}" class="btn btn-primary btn-sm" title="Información del alumno">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('view_update_student', ['matricula' => $student->matricula]) }}" class="btn btn-warning btn-sm" title="Editar Alumno">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Eliminar Alumno">
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