@extends('adminlte::layouts.app')


@section('htmlheader_title')
{{ trans('adminlte_lang::message.$perfil') }}
@endsection

@section('main-content')
<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">
      <!--titulo ventana-->
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
        <h3 class="box-title">Listado de Clientes</h3>
        <p id="mensaje">

        </p>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                @include('adminlte::errors.errors')
                @include('adminlte::errors.info')
                
                
                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-12">
                    <div id="list-client">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>CI / RUC</th>
                            <th>Contactos</th>
                            <th>Mail</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>            
                          <?Php      $i=1;          ?>
                          @foreach($clients as $client)
                          <tr>
                            <th><?Php      echo $i;          ?></th>
                            <th>
                              <strong>
                                {{ $client->nom_cli }} {{ $client->app_cli }}
                              </strong>
                            </th>     
                            <th>
                              <strong>
                                {{ $client->ci_cli }} {{ $client->ruc_cli }} 
                              </strong>
                            </th> 
                            <th>
                              <strong>
                                {{ $client->tlfn }} -/- {{ $client->cel }}
                              </strong>
                            </th>
                            <th>
                              <strong>
                                {{ $client->mail }}
                              </strong>
                            </th>
                            <th>
                              <strong>
                                {{ $client->dir }}
                              </strong>
                            </th>
                            <th>
                              <strong>
                                @if(($client->status)=='1')
                                Activado
                                @else
                                Desactivado
                                @endif
                              </strong>
                            </th>
                            
                            
                            <th>
                              <a href="{{ Route('clients.show', $client->id) }}" type="button" class="btn btn-block btn-primary btn-xs">Ver</a>
                            </th>
                            <th>
                              <a href="{{ Route('clients.edit', $client->id) }}" type="button" class="btn btn-block btn-warning btn-xs">Editar</a>
                            </th>
                            <th>        
                              {!! Form::open(['method'=>'DELETE', 'route'=>['clients.destroy', $client->id]]) !!}
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" onclick="return confirm('Esta seguro que desea eliminar el registro?')" class="btn btn-block btn-danger btn-xs">Eliminar</button>       
                              {!! Form::close() !!}
                            </th>
                          </tr>
                          <?Php      $i++;          ?>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>CI / RUC</th>
                            <th>Contactos</th>
                            <th>Mail</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </tfoot>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.box -->
    
    <script>
      /*$(document).ready(function(){
        listclient();
      });      

      var listclient = function()
      {
        $.ajax({
          type:'get',
          url:'{{ url("admin/listclient") }}',
          success: function(data){
            $('#list-client').empty().html(data);
          }
        });
      }*/
      
    </script>

    @endsection
