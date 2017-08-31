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
        <div class="panel-heading">Venta {{ $ventum->id }}</div>
        <div class="panel-body">

          <a href="{{ url('/admin/venta') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
          <a href="{{ url('/admin/venta/' . $ventum->id . '/edit') }}" title="Edit Ventum"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Eliminar</button></a>
          {!! Form::open([
          'method'=>'DELETE',
          'url' => ['admin/venta', $ventum->id],
          'style' => 'display:inline'
          ]) !!}
          {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
          'type' => 'submit',
          'class' => 'btn btn-danger btn-xs',
          'title' => 'Delete Ventum',
          'onclick'=>'return confirm("Confirm delete?")'
          ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th>ID</th><td>{{ $ventum->id }}</td>
                </tr>
                <tr><th> Secuencial </th><td> {{ $ventum->secuencial }} </td></tr><tr><th> Numerofactura </th><td> {{ $ventum->numerofactura }} </td></tr><tr><th> Claveacceso </th><td> {{ $ventum->claveacceso }} </td></tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> Venta, #{{ $ventum->numerofactura }}
        <small class="pull-right">Fecha: {{ $ventum->fecha_venta }}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      Empresa
      <address>
        <strong>{{ $empresa->nom_local }}.</strong><br>
        {{ $empresa->dir }}<br>
        Gualaceo - Cuenca - Ecuador<br>
        Contacto: {{ $empresa->tlfn }} / {{ $empresa->cel_movi }}-{{ $empresa->cel_claro }}<br>
        Email: {{ $empresa->mail }}
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      Cliente
      <address>
        <strong>{{ $cliente->nom_cli }} {{ $cliente->app_cli }}</strong><br>
        {{ $cliente->dir }}<br>
        Tlfn: {{ $cliente->tlfn }} / {{ $cliente->cel }}<br>
        Email: {{ $cliente->mail }}
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Invoice #{{ $ventum->numerofactura }}</b><br>
      <br>
      <b>Metodo pago:</b> {{ $ventum->id_tipopago }}<br>
      <b>Valor:</b> {{ $ventum->total }}<br>
      <b>Responsable:</b> {{ $personal->nom_per }} {{ $personal->app_per }}
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Codigo #</th>
            <th>Descripciòn</th>
            <th>Precio</th>
            <th>total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{ $item->cant }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->codbarra }}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->pre_ven }}</td>
            <td>{{ $item->total }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <p class="lead">Venta {{ $ventum->fecha_venta }}</p>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>${{ $ventum->subtotal }}</td>
          </tr>
          <tr>
            <th>Descuento({{ $val_descuento }}%)</th>
            <td>${{ $descuento }}</td>
          </tr>
          <tr>
            <th>Iva({{$iva_mostrar}})%:</th>
            <td>${{ $ventum->valorconiva }}</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>${{ $ventum->total }}</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
      </button>
      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generate PDF
      </button>
    </div>
  </div>
</section>
<!-- /.content -->
@endsection
