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

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        <h3 class="box-title">Proveedores</h3>
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
                    <a href="{{ url('/admin/proveedor/create') }}" class="btn btn-success btn-sm" title="Add New Proveedor">
                      <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                    </a>
                    <a href="{{ URL::to('downloadExcel/xls') }}" class="btn btn-success btn-sm" title="Download Excel xls">
                      <i class="fa fa-download" aria-hidden="true"></i> Excel xls
                    </a>
                    <a href="{{ URL::to('downloadExcel/xlsx') }}"  class="btn btn-success btn-sm" title="Download Excel xlsx"><i class="fa fa-download" aria-hidden="true"></i> Excel xlsx
                    </a>
                    <a href="{{ URL::to('downloadExcel/csv') }}" class="btn btn-success btn-sm" title="Download csv"><i class="fa fa-download" aria-hidden="true"></i> CSV
                    </a>

                    <div class="container">

                      <form style="margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="import_file" />
                        <button class="btn btn-primary btn-sm">Importar</button>
                      </form>
                      
                    </div>

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

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nom Pro</th>
                            <th>App Pro</th>
                            <th>Dir</th>
                            <th>Contactos</th>
                            <th>Correo</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($proveedor as $item)
                          <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nom_pro }}</td>
                            <td>{{ $item->app_pro }}</td>
                            <td>{{ $item->dir }}</td>
                            <td>{{ $item->tlfn }}/{{ $item->cel_movi }}/{{ $item->cel_claro }}</td>
                            <td>{{ $item->mail }}</td>
                            <td>
                              <a href="{{ url('/admin/proveedor/' . $item->id) }}" title="View Proveedor"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                              <a href="{{ url('/admin/proveedor/' . $item->id . '/edit') }}" title="Edit Proveedor"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                              {!! Form::open([
                              'method'=>'DELETE',
                              'url' => ['/admin/proveedor', $item->id],
                              'style' => 'display:inline'
                              ]) !!}
                              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                              'type' => 'submit',
                              'class' => 'btn btn-danger btn-xs',
                              'title' => 'Delete Proveedor',
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