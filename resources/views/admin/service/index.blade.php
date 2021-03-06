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
                    <div class="panel-heading">Servicios</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/service/create') }}" class="btn btn-success btn-sm" title="Add New Service">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/service', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Cantidad</th>
                                        <th>Pre. Compra</th>
                                        <th>Pre. Venta</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->codbarra }}</td>
                                        <td>{{ $item->cant }}</td>
                                        <td>{{ $item->pre_com }}</td>
                                        <td>{{ $item->pre_ven }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>
                                            <a href="{{ url('/admin/service/' . $item->id) }}" title="View Service"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/service/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/service', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Service',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $service->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
