@extends('layouts.plantilla-admin')

@section('contenido')
    <div class="row">
        <section class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Buzón del Plantel 28</h3>
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
                            <tbody>
                            @foreach($messages as $message)
                                @switch($message->status)
                                    @case(1)
                                    <td><i class="fa fa-folder"></i></td>
                                    @break
                                    @case(0)
                                    <td><i class="fa fa-folder-open"></i></td>
                                    @break
                                @endswitch
                                <td><a href="{{ route('view_detail_mailbox', ['id' => $message->id]) }}">{{ $message->name }}</a></td>
                                <td><a href="{{ route('view_detail_mailbox', ['id' => $message->id]) }}">{{ $message->mail }}</a></td>
                                <td>{{ $message->telephone }}</td>
                                <td>{{ $message->category_mailbox }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('view_detail_mailbox', ['id' => $message->id]) }}" class="btn btn-primary btn-sm" title="Ver mensaje">
                                            <i class="fa fa-comment"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" title="Eliminar mensaje">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </div>
                                </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection