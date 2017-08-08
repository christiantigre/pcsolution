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
      {!! Form::open(['method' => 'POST','id'=>'myForm','class'=>'form-horizontal', 'route' => 'clients.store', 'role' => 'search'])  !!}

      
      {{ csrf_field() }}


      @include('adminlte::layouts.client.form');
      

      <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-10">
          <a href="{{ Route('clients.index') }}" type="button" class="btn btn-default pull-right">Cancelar</a>
          {!! Form::submit('Guardar',['class'=>'btn btn-success pull-right']) !!}
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

