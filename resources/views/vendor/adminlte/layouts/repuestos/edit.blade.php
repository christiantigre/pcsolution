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
            <!--titulo ventana-->Editar Gasto en repuesto
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

                  {!! Form::model($repuesto,['route'=>['repuestos.update', $repuesto->id], 'method'=>'post','files' => 'true', 'enctype'=>'multipart/form-data']) !!}
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="box-body">
                    <div class="form-group">
                      {!! Form::label('repuesto','Repuesto',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('repuesto',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese repuesto...']) !!}

                        {!! Form::hidden('id_orden',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese repuesto...']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('valor','Valor',['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('valor',null,['class'=>'form-control','autocomplete'=>'off','autofocus'=>'autofocus','placeholder'=>'Ingrese valor ...']) !!}
                      </div>
                    </div>



                    

                    
                    <div class="form-group"></div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a href="{{ Route('orders.index') }}" type="button" class="btn btn-default pull-right">Cancelar</a>
                      <a href="{{asset('/admin/orders/edit/'.$repuesto->id_orden)}}" class="btn btn-default pull-right"></i> Atras</a>

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