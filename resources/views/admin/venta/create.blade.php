@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<!-- Main content -->
<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Registrar Nueva Orden</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <!--<form class="form-horizontal">-->
      {!! Form::open(['method' => 'POST','id'=>'myForm','class'=>'form-horizontal', 'url' => '/admin/venta', 'role' => 'search', 'files' => true])  !!}

      
      {{ csrf_field() }}

      <button class="btn btn-primary" id="guardaorden" type="submit" >Guardar</button>
      <a href="{{asset('/admin/venta/')}}" class="btn btn-default"> Cancelar</a>
      <a href="{{ url('/admin/articles/create') }}" class="btn btn-default btn-sm" title="Add New Article">
        <i class="fa fa-plus" aria-hidden="true"></i> Crear Cliente
      </a>
      <button class="btn btn-default" id="buscarcliente" type="button" data-toggle="modal" data-target="#modal-default"><i class="fa fa-search" aria-hidden="true"></i> Buscar Cliente</button>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="secuencial" class="col-sm-2 control-label"></label>
              <div class="col-sm-10">

                Fecha : {{ $fecha }}  




              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="fecha" class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
                N° : 2017-00980 

                {!! Form::hidden('numero',null,['class'=>'form-control','readonly'=>'readonly','autocomplete'=>'off','placeholder'=>'']) !!}
                {!! Form::hidden('anio',null,['class'=>'form-control','readonly'=>'readonly','autocomplete'=>'off','placeholder'=>'']) !!}               
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <!--articulo-->
          <div class="form-group">
            <label for="articulo" class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-10">
              {!! Form::text('cliente_name',null,['class'=>'form-control','autocomplete'=>'off','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <!--marca-->
          <div class="form-group">
            <label for="marca" class="col-sm-2 control-label">CI / RUC</label>
            <div class="col-sm-10">
              {!! Form::text('ci_ruc',null,['class'=>'form-control','autocomplete'=>'off','placeholder'=>'']) !!}
            </div>
          </div>
          <!--modelo-->            
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Pago</label>
            <div class="col-sm-10">
              {!! Form::text('modelo',null,['class'=>'form-control','autocomplete'=>'off','maxlength'=>'30','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">

          <!--tlfn cliente-->          
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Teléfono</label>
            <div class="col-sm-10">
              <?php 
              $tittle_modal = 'Buscar Cliente';
              ?>
              
              {!! Form::text('tlfn_cliente',null,['id'=>'tlfn_cliente','class'=>'form-control','data-toggle'=>'modal','data-target'=>'#modal-default','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}

            </div>
          </div>
          <!-- /.form-group -->
          <!--CI cliente-->          
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Dirección</label>
            <div class="col-sm-10">
              <input type="hidden" name="id_cliente" id="id_cliente" />
              {!! Form::text('dir_cli',null,['id'=>'dir_cli','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->

        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              {!! Form::text('email_cliente',null,['id'=>'email_cliente','class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Vendedor</label>
            <div class="col-sm-10">
              {!! Form::text('vendedor',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}            
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-12"> 

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Condensed Full Width Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Codigo</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Acción</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>

      {!! Form::close() !!}
      <!--</form>-->
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Comprobante de venta realizada.
    </div>
  </div>
  <!-- /.box -->


</section>
<!-- /.content -->
@endsection

