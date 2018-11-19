@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del alumno</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <li>
                                        <i class="fa fa-child bg-blue"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"> Datos Generales</h3>
                                            <div class="timeline-body">
                                                <strong><i class="fa fa-book margin-r-5"></i> Nombre completo</strong>
                                                <p class="text-muted">
                                                    {{ $student->names." ".$student->paterno." ".$student->materno }}
                                                </p>
                                                @switch($student->sex)
                                                    @case('M')
                                                    <strong>
                                                        <i class="fa fa-male margin-r-5"></i> Sexo
                                                    </strong>
                                                    <p class="text-muted">Masculino </p>
                                                    @break
                                                    @case('F')
                                                    <strong>
                                                        <i class="fa fa-female margin-r-5"></i>Sexo
                                                    </strong>
                                                    <p class="text-muted">Femenino </p>
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-male bg-aqua"></i>

                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Padres</h3>
                                            <div class="timeline-body">
                                                @foreach($parents_linked as $parent_linked)
                                                    <p class="text-muted">
                                                        <span> <i class="fa fa-user"></i></span> {{ $parent_linked->padres->names." ".$parent_linked->padres->paterno." ".$parent_linked->padres->materno }}
                                                        @if($parent_linked->is_tutor == 1)
                                                            <span class="label label-success">Tutor</span>
                                                        @endif
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                </ul>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('view_list_student') }}" class="btn btn-danger">
                        <span><i class="fa fa-backward"></i> </span>Regresar
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
