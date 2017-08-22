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
                    <div class="panel-heading">Venta</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/venta/create') }}" class="btn btn-success btn-sm" title="Add New Ventum">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nueva Venta
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/venta', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Secuencial</th><th>Numerofactura</th><th>Claveacceso</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($venta as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->secuencial }}</td><td>{{ $item->numerofactura }}</td><td>{{ $item->claveacceso }}</td>
                                        <td>
                                            <a href="{{ url('/admin/venta/' . $item->id) }}" title="View Ventum"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/venta/' . $item->id . '/edit') }}" title="Edit Ventum"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/venta', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Ventum',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $venta->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
