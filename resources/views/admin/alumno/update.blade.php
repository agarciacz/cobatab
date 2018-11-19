@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Actualizar alumno</h3>
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
                    <form method="post" action="{{ route('form_update_student', ['matricula'=>$student->matricula]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="matricula">{{ __('Matricula') }}</label>
                                    <input id="matricula" name="matricula"
                                           class="form-control {{ $errors->has('matricula') ? ' is-invalid' : '' }}"
                                           value="{{ $student->matricula }}" autofocus>
                                    @if ($errors->has('matricula'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('matricula') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="names">{{ __('Nombre(s)') }}</label>
                                    <input id="names" name="names"
                                           class="form-control {{ $errors->has('names') ? ' is-invalid' : '' }}"
                                           value="{{ $student->names }}" autofocus>
                                    @if ($errors->has('names'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('names') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="paterno">{{ __('Apellido Paterno') }}</label>
                                    <input id="paterno" name="paterno"
                                           class="form-control {{ $errors->has('paterno') ? ' is-invalid' : '' }}"
                                           value="{{ $student->paterno }}" autofocus>
                                    @if ($errors->has('paterno'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('paterno') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="materno">{{ __('Apellido Materno') }}</label>
                                    <input id="materno" name="materno"
                                           class="form-control {{ $errors->has('materno') ? ' is-invalid' : '' }}"
                                           value="{{ $student->materno }}" autofocus>
                                    @if ($errors->has('materno'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('materno') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" id="sex" value="M"> Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" id="sex" value="F"> Femenino
                                    </label>
                                    @if ($errors->has('sex'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sex') }}</strong>
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
        <section class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Vincular a
                        <strong>{{ $student->names." ".$student->paterno." ".$student->materno }}</strong> con sus
                        padres</h3>
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
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <form method="post"
                          action="{{ route('form_link_student_with_parents', ['matricula' => $student->matricula]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="padre">{{ __('Padres') }}</label>
                                    <select class="select2 form-control {{ $errors->has('padre') ? ' is-invalid' : '' }}"
                                            id="padre" name="padre[]" multiple="multiple" autofocus>
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->curp }}">{{ $parent->curp." | ".$parent->names." ".$parent->paterno." ".$parent->paterno }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('padre'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('padre') }}</strong>
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
        <section class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Padres de
                        <strong>{{ $student->names." ".$student->paterno." ".$student->materno }}</strong>
                    </h3>
                </div>
                <div class="box-body">
                    @if(count($parents_linked) >= 1)
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($parents_linked as $parent_linked)
                                    <tr>
                                        <td>
                                            {{$parent_linked->padres->names." ".$parent_linked->padres->paterno." ".$parent_linked->padres->materno}}
                                            @if($parent_linked->is_tutor == 1)
                                                <span class="label label-success">Tutor</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                @switch($parent_linked->is_tutor)
                                                    @case('')
                                                    <a class="btn btn-sm btn-success" href="{{ route('active_is_tutor' , ['id' => $parent_linked->id]) }} " title="Convertir en tutor">
                                                        <i class="fa fa-exchange"></i>
                                                    </a>
                                                    @break
                                                    @case(0)
                                                    <a class="btn btn-sm btn-success" href="{{ route('active_is_tutor' , ['id' => $parent_linked->id]) }}" title="Convertir en tutor">
                                                        <i class="fa fa-exchange"></i>
                                                    </a>
                                                    @break
                                                    @case(1)
                                                    <a class="btn btn-sm btn-default" href="{{ route('disable_is_tutor' , ['id' => $parent_linked->id]) }}" title="Quitar tutor">
                                                        <i class="fa fa-exchange"></i>
                                                    </a>
                                                    @break
                                                @endswitch
                                                <a href="{{ route('drop_link_student_with_parents', ['id' => $parent_linked->id]) }}"
                                                   class="btn btn-danger btn-sm">
                                                    <i class="fa fa-unlink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">Sin padres vinculados</div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scrips')
    <script>
        document.querySelector("[name=sex][value={{ $student->sex }}]").checked = true;
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection