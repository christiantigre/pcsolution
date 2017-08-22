<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Slug</th>
      <th>Stock</th>
      <th>Codbarra</th>
      <th>Estado</th>
      <th>P.V.P</th>
      <th>Imagen</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->nombre }}</td>
      <td>{{ $item->slug }}</td>
      <td>{{ $item->cant }}</td>
      <td>{{ $item->codbarra }}</td>
      <td>
        @if( ($item->is_active)=="0" )
        Inactivo
        @else
        Activo
        @endif
      </td>
      <td>{{ $item->pre_ven }}</td>
      <td><img src="{{ asset($item->img.'') }}" width="150" alt="image02" class="user-image"></td>
      <td>
        <a href="{{ url('/admin/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
        <a href="{{ url('/admin/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
        {!! Form::open([
        'method'=>'DELETE',
        'url' => ['/admin/product', $item->id],
        'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'title' => 'Delete Product',
        'onclick'=>'return confirm("Confirm delete?")'
        )) !!}
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>