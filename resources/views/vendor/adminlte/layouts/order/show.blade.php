@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<!-- Main content -->
<section class="content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Orden registrada
      <small>#{{ $orden->num_secuencial }}</small>
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-laptop"></i> {{ $orden->id_articulo }}
          <small class="pull-right">Fecha: {{ $date }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Cliente
        <address>
          <strong>Nombre : </strong>{{ $orden->nomcli }} {{ $orden->appcli }}<br>
          <strong>Telefono : </strong>{{ $orden->tlfncli }}<br>
          <strong>Celular : </strong>{{ $orden->celcli }}<br>
          <strong>Email : </strong>{{ $orden->mailcli }}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Orden #{{ $orden->num_secuencial }}</b><br>
        <br>
        <b>Fecha de recaudo : </b> {{ $orden->fecha_orden }}<br>
        <b>Fecha de revición : </b> {{ $orden->fecha_reparacion }}<br>
        <b>Estado equipo : </b> {{ $orden->id_estado }}<br>
        <b>Responsable : </b> {{ $orden->responsable }}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Extras :</p>
        
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          {{ $orden->notas }}.
        </p>
        <p class="lead">Problema que reporta :</p>
        
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          {{ $orden->problema_reportado }}.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Equipo</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Equipo:</th>
              <td>{{ $orden->id_articulo }}</td>
            </tr>
            <tr>
              <th>Marca:</th>
              <td>{{ $orden->id_marca }}</td>
            </tr>
            <tr>
              <th>Modelo:</th>
              <td>{{ $orden->modelo }}</td>
            </tr>
            <tr>
              <th>Serie:</th>
              <td>{{ $orden->serie }}</td>
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
        <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Editar
        </button>
        <a href="{{asset('/admin/orders/print/'.$orden->id)}}" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Print</a>
        <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generar PDF admin/orders/print
        </button>-->
      </div>
    </div>
  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
</section>
<!-- /.content -->
@endsection

