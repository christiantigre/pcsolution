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
      <h3 class="box-title">Registrar Nueva Venta</h3>

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
      <a href="" data-toggle="modal" data-target="#modal-registrocliente" class="btn btn-default" title="Add New Article">
        <i class="fa fa-plus" aria-hidden="true"></i> Crear Cliente
      </a>
      <a href="{{ url('/admin/articles/create') }}" class="btn btn-default" title="Add New Article">
        <i class="fa fa-plus" aria-hidden="true"></i> Crear Producto
      </a>
      
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

                {!! Form::hidden('id_cliente',null,['id'=>'id_cliente','class'=>'form-control','readonly'=>'readonly','autocomplete'=>'off','placeholder'=>'']) !!}
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <!--articulo-->
          <div class="form-group">
            <label for="articulo" class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-10">
              {!! Form::text('cliente_name',null,['id'=>'cliente_name','data-toggle'=>'modal','data-target'=>'#modal-seleccionacliente','class'=>'form-control','autocomplete'=>'off','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <!--marca-->
          <div class="form-group">
            <label for="marca" class="col-sm-2 control-label">CI / RUC</label>
            <div class="col-sm-10">
              {!! Form::text('ci_ruc',null,['id'=>'ci_ruc','class'=>'form-control','autocomplete'=>'off','placeholder'=>'']) !!}
            </div>
          </div>
          <!--modelo-->            
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Pago</label>
            <div class="col-sm-10">
              {!! Form::select('id_tipopagos', $tipopagos, null,['placeholder'=>'Selecciona','id'=>'id_tipopagos','class'=>'form-control','autofocus'=>'autofocus'])    !!}
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
              {!! Form::hidden('id_personal',$id_personal,['id'=>'id_persona','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}

              {!! Form::text('vendedor',$persona,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}            
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-12"> 

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Productos</h3>
              <button class="btn btn-default" id="buscarcliente" type="button" data-toggle="modal" data-target="#modal-seleccionaproductos"><i class="fa fa-search" aria-hidden="true"></i> Buscar Producto</button>

              <button class="btn btn-default" id="trashitems" type="button" onClick="trash(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar</button>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div id="list-cart">
              </div>             
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

@include('admin.venta.modalselec_cli')
@include('admin.venta.modalselec_prod')
@endsection

