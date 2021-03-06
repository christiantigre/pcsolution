@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Cargo</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/cargo/create') }}" class="btn btn-success btn-sm" title="Add New Cargo">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/cargo', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th><th>Cargo</th><th>Estado</th><th>Departamento</th><th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cargo as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->cargo }}</td><td>
                                    @if(($item->status)=='1')
                                    Activo
                                    @else
                                    Inactivo
                                    @endif
                                </td><td>{{ $item->departamento->departamento }}</td>
                                <td>
                                    <a href="{{ url('/admin/cargo/' . $item->id) }}" title="View Cargo"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                    <a href="{{ url('/admin/cargo/' . $item->id . '/edit') }}" title="Edit Cargo"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                    {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/cargo', $item->id],
                                    'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Cargo',
                                    'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $cargo->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
