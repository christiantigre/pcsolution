@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Proveedor {{ $proveedor->id }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/proveedor') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <a href="{{ url('/admin/proveedor/' . $proveedor->id . '/edit') }}" title="Edit Proveedor"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/proveedor', $proveedor->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Proveedor',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th> Nombre Proveedor  {{ $proveedor->nom_pro }} {{ $proveedor->app_pro }} </td>
                                    </tr>
                                    <tr>
                                        <th> Dirección </th>
                                        <td> {{ $proveedor->dir }} </td>
                                    </tr>
                                    <tr>
                                        <th> Telefono </th>
                                        <td> {{ $proveedor->tlfn }} </td>
                                    </tr>
                                    <tr>
                                        <th> Movistar </th>
                                        <td> {{ $proveedor->cel_movi }} </td>
                                    </tr>
                                    <tr>
                                        <th> Claro </th>
                                        <td> {{ $proveedor->cel_claro }} </td>
                                    </tr>
                                    <tr>
                                        <th> Fax </th>
                                        <td> {{ $proveedor->fax }} </td>
                                    </tr>
                                    <tr>
                                        <th> Correo </th>
                                        <td> {{ $proveedor->mail }} </td>
                                    </tr>
                                    <tr>
                                        <th> web </th>
                                        <td> {{ $proveedor->web }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ruc </th>
                                        <td> {{ $proveedor->ruc }} </td>
                                    </tr>
                                    <tr>
                                        <th> Representante </th>
                                        <td> {{ $proveedor->representante }} </td>
                                    </tr>
                                    <tr>
                                        <th> Actividad </th>
                                        <td> {{ $proveedor->actividad }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ubicación </th>
                                        <td> {{ $proveedor->pais->pais }}/{{ $proveedor->provincia->provincia }}/{{ $proveedor->canton->canton }} </td>
                                    </tr>
                                    <tr>
                                        <th> Estado </th>
                                        <td> @if(($proveedor->status)=='1')
                                            Activo
                                            @else
                                            Inactivo
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Empresa </th>
                                        <td> {{ $proveedor->empresa }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Ubicación </th>
                                        <td> {{ $proveedor->ubicacion }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Latitud </th>
                                        <td> {{ $proveedor->latitud }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Longitud </th>
                                        <td> {{ $proveedor->longitud }}
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
