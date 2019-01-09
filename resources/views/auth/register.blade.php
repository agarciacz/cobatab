@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-5 col-md-offset-3">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar usuario</h3>
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
                    <form method="POST" action="{{ route('form_create_user') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="user" type="text"
                                       class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" name="user"
                                       value="{{ old('user') }}" required autofocus>

                                @if ($errors->has('user'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Nombre(s)') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paterno"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno ') }}</label>

                            <div class="col-md-6">
                                <input id="paterno" type="text"
                                       class="form-control{{ $errors->has('paterno') ? ' is-invalid' : '' }}"
                                       name="paterno" value="{{ old('paterno') }}" required autofocus>

                                @if ($errors->has('paterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="materno"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno ') }}</label>

                            <div class="col-md-6">
                                <input id="materno" type="text"
                                       class="form-control{{ $errors->has('materno') ? ' is-invalid' : '' }}"
                                       name="materno" value="{{ old('materno') }}" required autofocus>

                                @if ($errors->has('materno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control"
                                        name="category" required>
                                    <option value="">Seleccionar categoria</option>
                                    <option value="A">Administrador</option>
                                    <option value="D">Director</option>
                                    <option value="S">Sub-director</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
