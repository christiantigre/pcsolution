@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Personal - {{ $personal->nom_per }} {{ $personal->app_per }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/personal') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                    <a href="{{ url('/admin/personal/' . $personal->id . '/edit') }}" title="Edit Personal"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/personal', $personal->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Personal',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $personal->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nombre </th><td> {{ $personal->nom_per }} </td>
                                </tr>
                                <tr>
                                    <th> Apellido </th><td> {{ $personal->app_per }} </td>
                                </tr>
                                 <tr>
                                    <th> Cedula </th><td> {{ $personal->cedula }} </td>
                                </tr>
                                 <tr>
                                    <th> Pasaporte </th><td> {{ $personal->pasaporte }} </td>
                                </tr>
                                <tr>
                                    <th> Correo </th><td> {{ $personal->mail }} </td>
                                </tr>
                                <tr>
                                    <th> Dirección </th><td> {{ $personal->dir }} </td>
                                </tr>
                                <tr>
                                    <th> Telefono </th><td> {{ $personal->tlfn }} </td>
                                </tr>
                                <tr>
                                    <th> Cel. movistar </th><td> {{ $personal->cel_movi }} </td>
                                </tr>
                                <tr>
                                    <th> Cel. Claro </th><td> {{ $personal->cel_claro }} </td>
                                </tr>
                                <tr>
                                    <th> Genero </th><td> {{ $personal->genero }} </td>
                                </tr>
                                <tr>
                                    <th> Estado civil </th><td> {{ $personal->estado_civil }} </td>
                                </tr>
                                <tr>
                                    <th> Num hijos </th><td> {{ $personal->hijos }} </td>
                                </tr>
                                <tr>
                                    <th> F. Nacimiento </th><td> {{ $personal->fecha_nac }} </td>
                                </tr>
                                <tr>
                                    <th> Nacionalidad </th>
                                    <td> 
                                        {{ $personal->id_pais }} / {{ $personal->id_provincia }} / {{ $personal->id_canton }} / {{ $personal->id_pais }} 
                                    </td>
                                </tr>
                                <tr>
                                    <th> Estado </th>
                                    <td> @if(($personal->status)=='1')
                                        Activo
                                        @else
                                        Inactivo
                                        @endif 
                                    </td>
                                </tr>
                                <tr>
                                    <th> Fotografia </th>
                                    <td> 
                                        {{ $personal->foto }} 
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
