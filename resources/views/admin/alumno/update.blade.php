@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-5 col-md-offset-3">
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
    </div>
@endsection
@section('scrips')
<script>
    document.querySelector("[name=sex][value={{ $student->sex }}]").checked = true;
</script>
@endsection