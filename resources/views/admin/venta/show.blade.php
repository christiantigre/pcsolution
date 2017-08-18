@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
                @include('adminlte::errors.errors')
                @include('adminlte::errors.info')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Venta {{ $ventum->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/venta') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/venta/' . $ventum->id . '/edit') }}" title="Edit Ventum"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Eliminar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/venta', $ventum->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Ventum',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ventum->id }}</td>
                                    </tr>
                                    <tr><th> Secuencial </th><td> {{ $ventum->secuencial }} </td></tr><tr><th> Numerofactura </th><td> {{ $ventum->numerofactura }} </td></tr><tr><th> Claveacceso </th><td> {{ $ventum->claveacceso }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
