<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Logo</th>
			<th>Web</th>
			<th>Link web</th>
			<th>Estado</th>
			<th>Web</th>
			<th>Cliente</th>
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
					<img src="{{ asset($client->logo.'') }}" width="150" alt="image02" class="user-image">
				</strong>
			</th>			
			<th>
				<strong>
					{{ $client->web }}
				</strong>
			</th>
			<th>
				<strong>
					{{ $client->link_web }} 
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
				<strong>
					@if(($client->web_visible)=='1')
					Visible
					@else
					Oculto
					@endif
				</strong>
			</th>
			<th>
				<strong>
					{{ $client->nom_cli }} {{ $client->app_cli }}({{ $client->users->name }})
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
			<th>Logo</th>
			<th>Web</th>
			<th>Link web</th>
			<th>Estado</th>
			<th>Web</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</tfoot>
</table>

<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>