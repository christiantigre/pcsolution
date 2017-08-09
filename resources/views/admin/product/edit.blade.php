@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product #{{ $product->id }}</div>
                <div class="panel-body">
                <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {!! Form::model($product, [
                    'method' => 'PATCH',
                    'url' => ['/admin/product', $product->id],
                    'class' => 'form-horizontal',
                    'files' => true
                    ]) !!}

                    @include ('admin.product.form', ['submitButtonText' => 'Actualizar'])

                    
                    <center>
                        <div class="form-group">
                            <label for="articulo" class="col-sm-2 control-label">Imagen actual</label>
                            <div class="col-sm-10">
                                <img src="{{ asset($product->img.'') }}" width="150" alt="image02" class="user-image">
                            </div>
                        </div>
                    </center>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection