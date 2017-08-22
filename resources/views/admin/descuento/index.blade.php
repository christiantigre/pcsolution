@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Descuento</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/descuento/create') }}" class="btn btn-success btn-sm" title="Add New Descuento">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/descuento', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                    <th>ID</th><th>Valor</th><th>Estado</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($descuento as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->valor }}</td>
                                    <td>
                                        @if(($item->status)=='1')
                                        Activo
                                        @else
                                        Inactivo
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/descuento/' . $item->id) }}" title="View Descuento"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                        <a href="{{ url('/admin/descuento/' . $item->id . '/edit') }}" title="Edit Descuento"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/admin/descuento', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Descuento',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $descuento->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
