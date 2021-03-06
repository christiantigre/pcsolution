@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">
      <!--titulo ventana-->
    </h3>


  </div>
  <!-- Main content -->
  <section class="content">
    <h3 class="box-title">Estados</h3>
    <p id="mensaje">

    </p>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            @include('adminlte::errors.errors')
            @include('adminlte::errors.info')
            <h3 class="box-title">
              <h3 class="box-title">
                <a href="{{ url('/admin/estados/create') }}" class="btn btn-success btn-sm" title="Add New Estado">
                  <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo
                </a>
                <br>
              </h3>
              <br>
            </h3>              
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              </div>
              <div class="col-xs-12">
                <div id="list-client">
                  <div class="table-responsive">
                    <table  id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th><th>Estado</th><th>Descripcion</th><th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($estados as $item)
                        <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->estado }}</td><td>{{ $item->descripcion }}</td>
                          <td>
                            <a href="{{ url('/admin/estados/' . $item->id) }}" title="View Estado"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                            <a href="{{ url('/admin/estados/' . $item->id . '/edit') }}" title="Edit Estado"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/estados', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Estado',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.box -->


@endsection