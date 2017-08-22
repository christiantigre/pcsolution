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
<div class="modal fade" id="modal-seleccionaproductos">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			{!! Form::open(['id'=>'myFormP'])  !!}
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Seleccióne Producto</h4>        
       </div>
       <div class="modal-body">
        <table id="productos" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Cod. barra</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($productos as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->nombre }}</td>
              <td>{{ $item->codbarra }}</td>
              <td>{{ $item->pre_ven }}</td>
              <td>
                <input type="number" class="form-control" min="1" max="{{ $item->cant }}" name="cantidad" id="cantidad" value="1">
              </td>
              <td>
                @if( ($item->is_active)=="0" )
                Inactivo
                @else
                Activo
                @endif
              </td>
              <td>
                <button type='button' id="{{ $item->id }}" value="{{ $item->id }}" class="btn btn-info btn-xs select_prod" data-dismiss='modal'> Seleccionar</button>                  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
     </div>
     {!! Form::close() !!}
   </div>
 </div>
</div>

