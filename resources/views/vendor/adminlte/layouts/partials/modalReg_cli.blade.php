
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
<div class="col-md-12">
	<div class="modal fade" id="modal-registrocliente">
		<div class="modal-dialog">
			<div class="modal-content">
				{!! Form::open(['id'=>'myForm'])  !!}
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>

						<h4 class="modal-title">Registrar Nuevo Cliente</h4>           

					</div>
					<div class="modal-body">
						<!--<div class="col-lg-12">-->
						<!--@include('adminlte::layouts.client.form');-->

            <!--<div class="input-group">
              <input type="text" class="form-control" id="rucprv" placeholder="Ingrese numero de ruc">
              <span class="input-group-btn">
                <button class="btn btn-default" id="proveedorrucchbuton" type="button">BUSCAR</button>
              </span>
          </div><!-- /input-group -->


          <!--nom cliente-->    
            <!--<div class="input-group">
              <input type="text" class="form-control" id="nompro" placeholder="Ingrese nombre empresa">
              <span class="input-group-btn">
                <button class="btn btn-default" id="proveedorempchbuton" type="button">BUSCAR</button>
              </span>
          </div><!-- /input-group -->

          <!-- /.form-group -->
          <!--Mail cliente-->     
            <!--<div class="input-group">
              <input type="text" class="form-control" id="mailpro" placeholder="Ingrese correo proveedor">
              <span class="input-group-btn">
                <button class="btn btn-default" id="proveedormailchbuton" type="button">BUSCAR</button>
              </span>
          </div><!-- /input-group -->




          <!--</div><!-- /.col-lg-6 -->
          <!-- /.form-group -->
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
</div>

