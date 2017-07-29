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
            <!--titulo ventana-->Editar Datos de la empresa
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

                  {!! Form::model($empress,['route'=>['empres.update', $empress->id], 'method'=>'post','files' => 'true', 'enctype'=>'multipart/form-data']) !!}
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="box-body">
                    <div class="form-group">
                      {!! Form::label('empresa','Empresa',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('nom_local',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Nombre de la empresa ...']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('empresa','Nombre',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('nom_prop',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Nombre del propietario ...']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('empresa','Apellido',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('app_prop',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Apellido del propietario ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('ruc','ID',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('ci_prop',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese id clientes ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('ruc','RUC',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('ruc_prop',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese ruc ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('telefono','Telefono',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('tlfn',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese telefono ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('celmovi','Celular movistar',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('cel_movi',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese telefono movi ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('celclaro','Celular claro',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('cel_claro',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese telefono claro ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('mail','Mail',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('mail',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese correo ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('dir','Dirección',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('dir',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese dirección ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('area','Espacialidad',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('area_especializacion',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese especialización ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('descripcion','Descripción',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40,'autofocus'=>'autofocus','autocomplete'=>'off']) !!}

                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('fax','Fax',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('fax',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese fax empresa ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('web','Web',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('link_web',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese link web ...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! form::label('logo','Logo',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        <input type="file" name="logo" id="logo" accept="image/*"  class="form-control"/>
                      </div>
                    </div>
                    <div class="form-group">
                      {!! form::label('logo','Iso-Logo',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        <input type="file" name="iso_logotipo" id="isologotipo" accept="image/*"  class="form-control"/>
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('slogan','Slogan',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('slogan',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese slogan ...']) !!}
                      </div>
                    </div>

                    
                   
                    <div class="form-group">
                      {!! Form::label('fb','Facebook',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('fb',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese facebook ...']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('tw','Twiter',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('tw',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese twiter ...']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('lin','LikeIn',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('likein',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese LikeIn ...']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('gog','Google+',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('gog',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese Google + ...']) !!}
                      </div>
                    </div>



                    <div class="box-body">                      
                      <h4>Actual Logo : <strong>
                        <img src="{{ asset($empress->logo.'') }}" width="320" alt="logo-empress">     
                      </strong></h4>
                    </div>
                    <div class="box-body">                      
                      <h4>Fondo : <strong>
                        <img src="{{ asset($empress->iso_logotipo.'') }}" width="320" alt="fondo">     
                      </strong></h4>
                    </div>




                    <div class="form-group"></div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a href="{{ Route('empres.index') }}" type="button" class="btn btn-default pull-right">Cancelar</a>
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