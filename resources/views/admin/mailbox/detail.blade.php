@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Leer mensaje</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3>{{ $message->category_mailbox }}
                            <span class="mailbox-read-time pull-right">{{ $message->created_at }}</span>
                        </h3>
                    </div>
                    <div class="mailbox-read-message">
                        <h5>
                            <strong>Nombre del remitente:</strong> {{ $message->name }}<br>
                            <strong>Correo:</strong> {{ $message->mail }}<br>
                            <strong>Numero telefonico:</strong> {{ $message->telephone }}
                        </h5>
                        <p>{{ $message->description }}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
            </div>
            <!-- /. box -->
        </div>
    </div>
@endsection