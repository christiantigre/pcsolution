@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Parroquia {{ $parroquium->parroquia }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/parroquia') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <a href="{{ url('/admin/parroquia/' . $parroquium->id . '/edit') }}" title="Edit Parroquium"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/parroquia', $parroquium->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Parroquium',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $parroquium->id }}</td>
                                </tr>
                                <tr><th> Parroquia </th><td> {{ $parroquium->parroquia }} </td></tr><tr><th> Iso </th><td> {{ $parroquium->iso }} </td></tr><tr><th> Estado </th><td> @if(( $parroquium->status )=='1') 
                                Activo
                                @else
                                Inactivo
                                @endif  </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
