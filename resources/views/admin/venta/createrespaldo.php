@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
                @include('adminlte::errors.errors')
                @include('adminlte::errors.info')

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Nueva Venta</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/venta') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/venta', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.venta.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
