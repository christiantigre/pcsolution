
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

<div class="modal fade" id="modal-seleccionacliente">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			{!! Form::open(['id'=>'myForm'])  !!}
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>

					<h4 class="modal-title">Seleccione Cliente</h4>           

				</div>
				<div class="modal-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Contactos</th>
                <th>mail</th>
                <th>Estado</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clientes as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nom_cli }} {{ $item->app_cli }}</td>
                <td>{{ $item->ci_cli }} {{ $item->ruc_cli }}</td>
                <td>{{ $item->dir }}</td>
                <td>{{ $item->tlfn }} / {{ $item->cel }}</td>
                <td>{{ $item->mail }}</td>
                <td>
                  @if( ($item->is_active)=="0" )
                  Inactivo
                  @else
                  Activo
                  @endif
                </td>
                <td>
                <button type='button' id="{{ $item->id }}" value="{{ $item->id }}" class="btn btn-info btn-xs select_cli" data-dismiss='modal'> Seleccionar</button>                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         <!--{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}-->
       </div>
       {!! Form::close() !!}
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

