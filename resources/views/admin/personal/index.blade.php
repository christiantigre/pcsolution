@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Personal</div>                
                @include('adminlte::errors.errors')
                @include('adminlte::errors.info')
                <div class="panel-body">
                    <a href="{{ url('/admin/personal/create') }}" class="btn btn-success btn-sm" title="Add New Personal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/personal', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th><th>Nombre</th><th>Correo</th><th>Cargo</th><th>Estado</th><th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($personal as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nom_per }} {{ $item->app_per }}</td><td>{{ $item->mail }}</td><td>{{ $item->cargo->cargo }}</td><td>@if(($item->status)=='1')
                                    Activo
                                    @else
                                    Inactivo
                                    @endif</td>
                                    <td>
                                        <a href="{{ url('/admin/personal/' . $item->id) }}" title="View Personal"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                        <a href="{{ url('/admin/personal/' . $item->id . '/edit') }}" title="Edit Personal"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/admin/personal', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $personal->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
