@extends('layouts.plantilla-public')

@section('titulo', 'Buzón del Plantel 28')

@section('contenido')
    <section class="about-text ptb-100" style="margin-top: 15px">
        <section class="section-title">
            <div class="container text-center">
                <h2>Buzon Plantel 28</h2>
                <h3>Quejas, denuncias y felicitaciones.</h3>
                <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('form_create_mailbox_cobatab') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('Nombre') }}</label>
                                    <input id="name" name="name"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           value="{{ old('name') }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">{{ __('Correo electrónico') }}</label>
                                    <input id="mail" name="mail"
                                           class="form-control {{ $errors->has('mail') ? ' is-invalid' : '' }}"
                                           value="{{ old('mail') }}" autofocus>
                                    @if ($errors->has('mail'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telephone">{{ __('Numero telefonico') }}</label>
                                    <input id="telephone" name="telephone"
                                           class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                           value="{{ old('telephone') }}" autofocus>
                                    @if ($errors->has('telephone'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('telephone') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_mailbox">{{ __('Usted va a realizar una: ') }}</label>
                                    <select id="category_mailbox" name="category_mailbox"
                                            class="form-control {{ $errors->has('category_mailbox') ? ' is-invalid' : '' }}"
                                            autofocus>
                                        <option value="">Seleccione una categoria</option>
                                        @foreach($categories_mails as $category_mail)
                                            <option value="{{$category_mail->category_mailbox}}">{{$category_mail->category_mailbox}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_mailbox'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category_mailbox') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ __('Descripción ') }}</label>
                                    <textarea id="description" name="description"
                                              class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              autofocus>{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><span><i class=""></i> </span>Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection