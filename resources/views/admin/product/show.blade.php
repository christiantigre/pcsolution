@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Product {{ $product->slug }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/product', $product->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Eliminar',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th> Nombre </th><td> {{ $product->nombre }} </td></tr><tr><th> Slug </th><td> {{ $product->slug }} </td>
                                </tr>
                                <tr><th> Codbarra </th><td> {{ $product->codbarra }} </td>
                                </tr>
                                <tr><th> Stock </th><td> {{ $product->cant }} </td>
                                </tr>
                                <tr><th> P.V.P </th><td> {{ $product->pre_ven }} </td>
                                </tr>
                                <tr><th> Precio de compra </th><td> {{ $product->pre_com }} </td>
                                </tr>
                                <tr><th> Titulo en pag web </th><td> {{ $product->prgr_tittle }} </td>
                                </tr>
                                <tr><th> Prod. nuevo </th><td> {{ $product->nuevo }} </td>
                                </tr>
                                <tr><th> Promoción </th><td> {{ $product->promocion }} </td>
                                </tr>
                                <tr><th> Catalogo </th><td> {{ $product->catalogo }} </td>
                                </tr>
                                <tr><th> Estado </th><td> 
                                @if(($product->is_active)=='0')
                                    Inactivo
                                @else
                                    Activo
                                @endif
                                </td>
                                </tr>
                                <tr><th> Sección </th><td> {{ $product->articulo->articulo }} </td>
                                </tr>
                                <tr><th> Marca </th><td> {{ $product->marca->marca }} </td>
                                </tr>
                                <tr>
                                    <th>Imagen</th>
                                    <td>
                                            <img src="{{ asset($product->img.'') }}" width="150" alt="image02" class="user-image">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
