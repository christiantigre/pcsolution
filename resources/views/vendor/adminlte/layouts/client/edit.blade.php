@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection


@section('main-content')


<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
            <!--titulo ventana-->Editar Cliente
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
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
                  @include('adminlte::errors.errors')

                  {!! Form::model($cliente,['route'=>['clients.update', $cliente->id], 'method'=>'post','files' => 'true', 'enctype'=>'multipart/form-data']) !!}
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      {!! Form::label('nomcli','Nombre cliente',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('nom_cli',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese nombre del cliente ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('appcli','Apellido cliente',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('app_cli',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese apellido del cliente ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('ci','DNI',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('ci_cli',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Identificación de cliente ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('ruccli','Ruc Cliente',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('ruc_cli',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Razon social ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('fechanac','F. nacimiento',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          {!! Form::text('fecha_nac',null,['id'=>'datepicker','class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese fecha de nacimiento ...']) !!}
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      {!! Form::label('dirlocal','Dirección',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('dir',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Direccion de cliente ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('telefono','Telefono',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('tlfn',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese numero de telefono...']) !!}
                      </div>
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label('celular','Celular',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('cel',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese numero de celular...']) !!}
                      </div>
                    </div>                    

                    <div class="form-group">
                      {!! Form::label('corrreo','Correo',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('mail',null,['class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','placeholder'=>'Ingrese correo electronico...']) !!}
                      </div>
                    </div>       

                    <div class="form-group">
                      {!! Form::label('estado','Estado',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        <select name="status" class="form-control">
                          <option value="1">Activado</option>
                          <option value="0">Desactivado</option>
                        </select>
                      </div>  
                    </div>                    

                    <div class="form-group"></div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-sm-offset-2 col-sm-10">
                    <a href="{{ Route('clients.index') }}" type="button" class="btn btn-default pull-right">Cancelar</a>
                      {!! Form::submit('Guardar',['class'=>'btn btn-success pull-right']) !!}
                    </div>
                  </div>
                  <!-- /.box-footer -->
                  <!--</form>-->
                  {!! Form::close() !!}
                  <!--/.col (right) -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->

            </section>
            <!-- /.content -->
            @endsection

          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>