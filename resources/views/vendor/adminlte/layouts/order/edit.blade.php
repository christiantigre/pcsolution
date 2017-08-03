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
      <h3 class="box-title">Editar Orden</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <!--<form class="form-horizontal">-->
      
      {!! Form::model($orden,['route'=>['orders.update', $orden->id],'id'=>'myForm', 'method'=>'post','class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}

      {!! Form::hidden('id', $orden->id,['id'=>'id','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}

      
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <button class="btn btn-primary" id="guardaorden" type="submit" >Guardar</button>
      <a href="{{asset('/admin/orders/')}}" class="btn btn-default"> Cancelar</a>
      <a href="{{ Route('orders.show', $orden->id) }}" class="btn btn-default"> Regresar</a>
      <a href="{{ Route('orders.show', $orden->id) }}" type="button" class="btn btn-success">Ver</a>
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
                N° : {{ $sec }} 

                {!! Form::hidden('fechaorden',$fecha,null,['class'=>'form-control','readonly'=>'readonly','autocomplete'=>'off','placeholder'=>'']) !!}
                {!! Form::hidden('numero',$numbers,null,['class'=>'form-control','readonly'=>'readonly','autocomplete'=>'off','placeholder'=>'']) !!}
                {!! Form::hidden('anio',$anio,null,['class'=>'form-control','readonly'=>'readonly','autocomplete'=>'off','placeholder'=>'']) !!}               
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <!--articulo-->
          <div class="form-group">
            <label for="articulo" class="col-sm-2 control-label">Articulo</label>
            <div class="col-sm-10">
              {!! Form::select('id_articulo', $articulos, null,['placeholder'=>'Selecciona','id'=>'id_articulo','class'=>'form-control','autofocus'=>'autofocus'])    !!}

              <!-- {!! Form::text('articulo',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}-->
            </div>
          </div>
          <!-- /.form-group -->
          <!--marca-->
          <div class="form-group">
            <label for="marca" class="col-sm-2 control-label">Marca</label>
            <div class="col-sm-10">
              <!--{!! Form::text('marca',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}-->
              {!! Form::select('id_marca', $marcas, null,['placeholder'=>'Selecciona','id'=>'id_marca','class'=>'form-control','autofocus'=>'autofocus'])    !!}
            </div>
          </div>
          <!--modelo-->            
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Modelo</label>
            <div class="col-sm-10">
              {!! Form::text('modelo',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','maxlength'=>'30','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <!--serie-->            
          <div class="form-group">          
            <label for="serie" class="col-sm-2 control-label">Serie</label>
            <div class="col-sm-10">
              {!! Form::text('serie',null,['class'=>'form-control','maxlength'=>'30','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">

          <div class="form-group"> 
            <div class="col-sm-10">
              <button class="btn btn-default" id="buscarcliente" type="button" data-toggle="modal" data-target="#modal-default">Buscar Cliente</button>
            </div>
          </div>

          <!--nom cliente-->          
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Nombre Cliente</label>
            <div class="col-sm-10">
              <?php 
              $tittle_modal = 'Registrar Abono';
              ?>
              {!! Form::hidden('nomcli',null,['id'=>'nom_cli','class'=>'form-control','data-toggle'=>'modal','data-target'=>'#modal-default','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Buscar cliente']) !!}
              {!! Form::text('name_cli',$nombre,['id'=>'name_cli','class'=>'form-control','data-toggle'=>'modal','data-target'=>'#modal-default','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Buscar cliente']) !!}
              {!! Form::hidden('appcli',null,['id'=>'app_cli','class'=>'form-control','data-toggle'=>'modal','data-target'=>'#modal-default','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Buscar cliente']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <!--CI cliente-->          
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">CI</label>
            <div class="col-sm-10">
              <!--<input type="hidden" name="idcliente" id="idcliente" />-->
              {!! Form::hidden('id_cliente',null,['id'=>'idcliente','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}

              {!! Form::text('cicli',null,['id'=>'ci_cli','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
              {!! Form::hidden('dircli',null,['id'=>'dir_cli','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <!--telefono cliente-->            
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Telefono</label>
            <div class="col-sm-10">
              {!! Form::text('tlfncli',null,['id'=>'tlfn','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Celular</label>
            <div class="col-sm-10">
              {!! Form::text('celcli',null,['id'=>'cel','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Correo</label>
            <div class="col-sm-10">
              {!! Form::text('mailcli',null,['id'=>'mail','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="modelo" class="col-sm-2 control-label">Fecha reparación</label>
            <div class="col-sm-10">
              <!--{!! Form::text('modelo',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Probable reparación']) !!}-->

              {!! Form::text('fecha_reparacion',$date2,['id'=>'datepicker','class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese fecha de nacimiento ...']) !!}
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-10">
              <!--{!! Form::text('serie',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}-->
              {!! Form::select('id_estado', $estados, null,['placeholder'=>'Selecciona','id'=>'id_estado','class'=>'form-control','autofocus'=>'autofocus'])    !!}
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Anticipo</label>
            <div class="col-sm-10">
              <!--{!! Form::text('serie',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}-->
              {!! Form::text('anticipo', null,['placeholder'=>'Anticipo 30.99','id'=>'anticipo','class'=>'form-control','autofocus'=>'autofocus'])    !!}
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Abono</label>
            <div class="col-sm-10">
              <!--{!! Form::text('serie',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'']) !!}-->
              <button class="btn btn-default" id="buscarcliente" type="button" data-toggle="modal" data-target="#modal-abono">Registrar Abono</button>
              
              @if(count($abonos)>0)
              <table class="table table-condensed" id="tablaAbono">
                <caption>ABONOS</caption>
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Abono</th>
                    <th>Emite</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?Php $i=1; ?>
                  @foreach($abonos as $abono)

                  <tr>
                    <td>{{ $abono->fecha }}</td>
                    <td>{{ $abono->abono }}</td>
                    <td>{{ $abono->emitente }}</td>
                    <td>
                      <a href="{{ Route('abonos.edit', $abono->id) }}" type="button" class="btn btn-block btn-warning btn-xs">Editar</a>
                    </td>
                    <td>
                     {!! Form::hidden('id_abono', $abono->id,['id'=>'id_abono','placeholder'=>'Anticipo 30.99','id'=>'anticipo','class'=>'form-control','autofocus'=>'autofocus'])    !!}

                     <a href="{{ asset('/admin/abonos/delete/'.$abono->id) }}" type="button" class="btn btn-block btn-danger btn-xs">Eliminar</a>

                     
                   </td>
                 </tr>

                 <?Php $i++; ?>
                 @endforeach
               </tbody>
             </table>
             @else
             No registra abonos
             <table class="table table-condensed" id="tablaAbono">
              <caption>ABONOS</caption>
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Abono</th>
                  <th>Emite</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?Php $i=1; ?>
                @foreach($abonos as $abono)

                <tr>
                  <td>{{ $abono->fecha }}</td>
                  <td>{{ $abono->abono }}</td>
                  <td>{{ $abono->emitente }}</td>
                  <td>
                    <a href="{{ Route('abonos.edit', $abono->id) }}" type="button" class="btn btn-block btn-warning btn-xs">Editar</a>
                  </td>
                  <td>
                    <button id="delete_abono" class="btn btn-block btn-danger btn-xs" value="{{ $abono->id }}">Eliminar</button>
                  </td>
                  <td>


                  </td>
                </tr>

                <?Php $i++; ?>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="serie" class="col-sm-2 control-label">Adeuda</label>
          <div class="col-sm-10">
            {!! Form::text('adeuda', $pre_final,['placeholder'=>'Adeuda el cliente','id'=>'valor','class'=>'form-control','autofocus'=>'autofocus'])    !!}
          </div>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <label for="serie" class="col-sm-2 control-label">Valor total</label>
          <div class="col-sm-10">
            {!! Form::text('valor', null,['placeholder'=>'Precio final 30.99','id'=>'valor','class'=>'form-control','autofocus'=>'autofocus'])    !!}
          </div>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-12"> 

        <div class="form-group">
         <label for="fecha" class="col-sm-2 control-label">Problema que reporta</label>
         <div class="col-sm-10">
          {!! Form::text('problema_reportado',null,['class'=>'form-control','autocomplete'=>'off','placeholder'=>'','maxlength'=>'255']) !!}
        </div>
      </div>
    </div>
    <div class="col-md-12">           

     <div class="form-group">
       <label for="notas" class="col-sm-2 control-label">Notas</label>
       <div class="col-sm-10">
        {!! Form::text('notas',null,['class'=>'form-control','autocomplete'=>'off','placeholder'=>'','maxlength'=>'255']) !!}
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
<!--</form>-->
<!-- /.row -->
</div>
<!-- /.box-body -->
<div class="box-footer">
  Imprimir la orden de trabajo y entregar la impresión original al cliente. quedarse con la copia de la orden.
</div>
</div>
<!-- /.box -->


</section>
<!-- /.content -->
@endsection



<div class="modal fade" id="modal-abono">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(['id'=>'FormAbono'])  !!}
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <?Php
          if (empty($tittle_modal)) {
            ?>
            <h4 class="modal-title">Default Modal</h4>
            <?php
          }else{
            ?>
            <h4 class="modal-title"><?Php echo $tittle_modal ?></h4>
            <?php
          }
          ?>

        </div>
        <div class="modal-body">
          <div class="col-lg-12">

            <div class="form-group">
              <label for="modelo" class="col-sm-2 control-label">Abono :</label>
              <div class="col-sm-10">
                {!! Form::text('abono',null,['id'=>'abono','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','maxlength'=>'30','placeholder'=>'Abono 22.22']) !!}
              </div>
            </div>


            <div class="form-group">
              <label for="modelo" class="col-sm-2 control-label">Articulo :</label>
              <div class="col-sm-10">
                {!! Form::text('articulo',null,['id'=>'articulo','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','maxlength'=>'30','placeholder'=>'Articulo que cubre el precio']) !!}
              </div>
            </div>

            <div class="form-group">
              <label for="modelo" class="col-sm-2 control-label">Emite :</label>
              <div class="col-sm-10">
                {!! Form::text('emitente',null,['id'=>'emitente','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','maxlength'=>'30','placeholder'=>'Persona que realiza el abono']) !!}
              </div>
            </div>

            <div class="form-group">
              <label for="modelo" class="col-sm-2 control-label">Fecha :</label>
              <div class="col-sm-10">
                {!! Form::text('fecha',null,['id'=>'datepicker','class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','maxlength'=>'30','placeholder'=>'Fecha de Abono']) !!}
              </div>
            </div> 

          </div><!-- /.col-lg-6 -->
          <!-- /.form-group -->
          <!-- /.row -->            
        </div>
        <div class="modal-footer">
          <div class="form-group">

            <button type="button" id="save_abono" onclick="guardaAbono();" class="btn btn-primary pull-right" data-dismiss="modal">Guardar</button>
            
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>

          </div>

        </div>
        {!! Form::close() !!}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
