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
            <div class="panel-heading">Servicio {{ $service->nombre }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/service') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <a href="{{ url('/admin/service/' . $service->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/service', $service->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Service',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $service->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nombre </th><td> {{ $service->nombre }} </td>
                                </tr>
                                <tr>
                                    <th> Codigo </th><td> {{ $service->codbarra }} </td>
                                </tr>
                                <tr>
                                    <th> Cantidad </th><td> {{ $service->cant }} </td>
                                </tr>
                                <tr>
                                    <th> Precio compra </th><td> {{ $service->pre_com }} </td>
                                </tr>
                                <tr>
                                    <th> Precio venta </th><td> {{ $service->pre_ven }} </td>
                                </tr>
                                <tr>
                                    <th> Titulo servicio </th><td> {{ $service->prgr_tittle }} </td>
                                </tr>
                                <tr>
                                    <th> Descripción </th><td> {{ $service->descripcion }} </td>
                                </tr>
                                <tr>
                                    <th> Nuevo </th><td> 
                                    @if(( $service->nuevo )=='1') 
                                    Activo
                                    @else
                                    Inactivo
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th> promocion </th><td> 
                                @if(( $service->promocion )=='1') 
                                Activo
                                @else
                                Inactivo
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th> catalogo </th><td> 
                            @if(( $service->catalogo )=='1') 
                            Activo
                            @else
                            Inactivo
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th> Estado </th><td> 
                        @if(( $service->is_active )=='1') 
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                </tr>

                <tr>
                    <th> Imagen </th><td> 
                    <img src="{{ asset($service->img.'') }}" width="150" alt="Image service" class="user-image">
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
