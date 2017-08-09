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
                  
                  @include('adminlte::layouts.client.form');
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