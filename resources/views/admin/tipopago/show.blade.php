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
                    <div class="panel-heading">Tipopago {{ $tipopago->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/tipopago') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/tipopago/' . $tipopago->id . '/edit') }}" title="Edit Tipopago"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/tipopago', $tipopago->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Tipopago',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tipopago->id }}</td>
                                    </tr>
                                    <tr><th> Estadopago </th><td> {{ $tipopago->tipopago }} </td></tr><tr><th> Status </th><td> {{ $tipopago->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
