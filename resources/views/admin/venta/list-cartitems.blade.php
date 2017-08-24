 {{ csrf_field() }}
 <table class="table table-condensed" id="itemscart">
  <tbody>
    <tr>
      <th style="width: 10px">#</th>
      <th>Cod barra</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Total</th>
      <th>Acción</th>
    </tr>
    @foreach($carrito as $item)
    <tr>
      <td style="width: 10px">{{ $item->id }}</td>
      <td>{{ $item->codbarra }}</td>
      <td>{{ $item->nomproducto }}</td>
      <td>{{ $item->cantidad }}</td>
      <td>{{ $item->precio }}</td>
      <td>{{ $item->total }}</td>
      <td>Acción</td>
    </tr>
    @endforeach

  </tbody>
</table>