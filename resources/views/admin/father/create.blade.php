@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-5 col-md-offset-3">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar padre</h3>
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
                    <form method="post" action="{{ route('form_create_father') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="curp">{{ __('CURP') }}</label>
                                    <input id="curp" name="curp"
                                           class="form-control {{ $errors->has('curp') ? ' is-invalid' : '' }}"
                                           value="{{ old('curp') }}" autofocus>
                                    @if ($errors->has('curp'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('curp') }}</strong>
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
                                           value="{{ old('names') }}" autofocus>
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
                                           value="{{ old('paterno') }}" autofocus>
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
                                           value="{{ old('materno') }}" autofocus>
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
                                    <label for="telephone1">{{ __('Teléfono Celular') }}</label>
                                    <input id="telephone1" name="telephone1"
                                           class="form-control {{ $errors->has('telephone1') ? ' is-invalid' : '' }}"
                                           value="{{ old('telephone1') }}" autofocus>
                                    @if ($errors->has('telephone1'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('telephone1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telephone2">{{ __('Teléfono de casa (OPCIONAL)') }}</label>
                                    <input id="telephone2" name="telephone2"
                                           class="form-control {{ $errors->has('telephone2') ? ' is-invalid' : '' }}"
                                           value="{{ old('telephone2') }}" autofocus>
                                    @if ($errors->has('telephone2'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('telephone2') }}</strong>
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