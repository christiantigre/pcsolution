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
        <h3 class="box-title">Listado de Ordenes</h3>
        <p id="mensaje">

        </p>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                @include('adminlte::errors.errors')
                @include('adminlte::errors.info')
                <h3 class="box-title">
                  <h3 class="box-title">
                    <a href="{{ Route('orders.create') }}" type="button" class="btn btn-block btn-success btn-xs">Nuevo</a>
                    <br>
                  </h3>
                  <br>
                </h3>              
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
                            <th>Secuencial</th>
                            <th>Fecha orden</th>
                            <th>Articulo / Marca / Modelo / Serie</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>            
                          <?Php      $i=1;          ?>
                          @foreach($orders as $order)
                          <tr>
                            <th><?Php      echo $i;          ?></th>
                            <th>
                              <strong>
                                {{ $order->num_secuencial }} 
                              </strong>
                            </th>     
                            <th>
                              <strong>
                                {{ $order->fecha_orden }} 
                              </strong>
                            </th> 
                            <th>
                              <strong>
                                {{ $order->articulo->articulo }} / {{ $order->marca->marca }} / {{ $order->modelo}} / {{ $order->serie}}
                              </strong>
                            </th>
                            
                            <th>
                              <strong>
                                {{ $order->nomcli }} {{ $order->appcli }} / {{ $order->tlfncli }} / {{ $order->celcli }} / {{ $order->mailcli }}
                              </strong>
                            </th>
                            <th>
                              <strong>
                                {{ $order->estado->estado }}
                              </strong>
                            </th>
                            <th>
                              <strong>
                                {{ $order->valor }}
                              </strong>
                            </th>
                            
                            
                            <th>
                              <a href="{{ Route('orders.show', $order->id) }}" type="button" class="btn btn-block btn-primary btn-xs">Ver</a>
                            </th>
                            <th>
                              <a href="{{ Route('orders.edit', $order->id) }}" type="button" class="btn btn-block btn-warning btn-xs">Editar</a>
                            </th>
                            <th>        
                              {!! Form::open(['method'=>'DELETE', 'route'=>['orders.destroy', $order->id]]) !!}
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
                            <th>Secuencial</th>
                            <th>Fecha orden</th>
                            <th>Articulo / Marca / Modelo / Serie</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Precio</th>
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
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
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
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

