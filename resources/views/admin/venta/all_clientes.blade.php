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
      <a href="{{ url('/admin/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Seleccionar</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>