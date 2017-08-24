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
    <?php $i=1; ?>
    @foreach($carrito as $item)
    <tr>
      <td style="width: 10px"><?Php echo $i; ?></td>
      <td>{{ $item->codbarra }}</td>
      <td>{{ $item->nomproducto }}</td>
      <td>{{ $item->cantidad }}</td>
      <td>{{ $item->precio }}</td>
      <td>{{ $item->total }}</td>
      <td>
      <button class="btn btn-default delete_item" id="{{ $item->id }}" value="{{ $item->id }}" type="button" title="QUITAR" onClick="delete_item(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> </button>
      </td>
    </tr>
    <?Php $i++; ?>
    @endforeach

  </tbody>
</table>