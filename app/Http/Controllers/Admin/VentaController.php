<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ventum;
use App\Product;
use App\Client;
use App\Personal;
use App\Tipopago;
use App\Carrito;
use App\Venta_item;
use App\Iva;
use App\Service;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $venta = Ventum::where('secuencial', 'LIKE', "%$keyword%")
            ->orWhere('numerofactura', 'LIKE', "%$keyword%")
            ->orWhere('claveacceso', 'LIKE', "%$keyword%")
            ->orWhere('total', 'LIKE', "%$keyword%")
            ->orWhere('subtotal', 'LIKE', "%$keyword%")
            ->orWhere('valorconiva', 'LIKE', "%$keyword%")
            ->orWhere('valorsiniva', 'LIKE', "%$keyword%")
            ->orWhere('valorcondescuento', 'LIKE', "%$keyword%")
            ->orWhere('fecha_venta', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->orWhere('responsable', 'LIKE', "%$keyword%")
            ->orWhere('cantidad_items', 'LIKE', "%$keyword%")
            ->orWhere('id_iva', 'LIKE', "%$keyword%")
            ->orWhere('id_descuento', 'LIKE', "%$keyword%")
            ->orWhere('id_cliente', 'LIKE', "%$keyword%")
            ->orWhere('id_vendedor', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $venta = Ventum::paginate($perPage);
        }

        return view('admin.venta.index', compact('venta'));
    }

    public function addItem(Request $request){
       if ($request->ajax()) {        
        $precio_pro=$request->precio;
        $cantidad_pro = $request->cantidad;
        $total_prod = ($precio_pro*$cantidad_pro);
        $item = new Carrito;
        $item->idproducto = $request->idproducto;
        $item->nomproducto = $request->nombre;
        $item->codbarra = $request->codbarra;
        $item->precio = $request->precio;
        $item->cantidad = $request->cantidad;
        $item->total = $total_prod;
        if($item->save()){
            return response()->json(["mensaje"=>"Registrado con exito","data"=>$request->all()]);
        }else{
            return response()->json(["mensaje"=>"Error !!! al guardar","data"=>$request->all()]);
        }

    }else{
     return response()->json(["mensaje"=>$request->all()]);   
 }
}

public function deleteItem(Request $request){
   if ($request->ajax()) {        
    $item = Carrito::find($request->id);
    if($item->delete()){
        return response()->json(["mensaje"=>"Eliminado con exito","data"=>"Eliminado"]);
    }else{
        return response()->json(["mensaje"=>"Error !!! al guardar","data"=>$request->all()]);
    }
}else{
 return response()->json(["mensaje"=>$request->all()]);   
}
}

public function trashItem(Request $request){
    if ($request->ajax()) {        
        if(Carrito::truncate()){
            return response()->json(["mensaje"=>"Vaciado con exito","data"=>"Vaciado"]);
        }else{
            return response()->json(["mensaje"=>"Error !!! al vaciar","data"=>$request->all()]);
        }
    }else{
     return response()->json(["mensaje"=>$request->all()]);   
 }
}

public function getproducts(){
    $product = Product::orderBy('id','DESC')->get(); 

    return view('admin.venta.all_product', compact('product'));   
    dd($productos);
}

public function getclientes(){
    $clientes = Client::orderBy('id','DESC')->get(); 

    return view('admin.venta.all_clientes', compact('clientes'));   
    dd($productos);
}
public function getservices(){
    $services = Service::orderBy('id','DESC')->get(); 
    return view('admin.venta.all_services', compact('services'));   
}

function extraerdatoscliente(Request $request){
    if ($request->ajax()) {
        $cliente = Client::orderBy('id','DESC')->where('id',$request->id)->first();
        return response()->json($cliente);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public static function generate_numbers($start, $count, $digits) {
       $result = array();
       for ($n = $start; $n < $start + $count; $n++) {
          $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
      }
      return $result;
  }

  public function create()
  {
    $carbon = new Carbon();
    $carbon  = Carbon::now(new \DateTimeZone('America/Guayaquil'));
    $year = $carbon->format('Y');
    $fechaventa = $carbon->format('Y-m-d');

    $contador = Ventum::count();
    $contadorinc = $contador + 1;
    $numbers = $this->generate_numbers($contadorinc, 1, 6);
    $arraynumber = implode("", $numbers);

    $secuencial = $year.'-'.$arraynumber;

    $logueado = \Auth::id();

    $persona = Personal::orderBy('id','DESC')->where('id_user',$logueado)->first();
    if(empty($persona)){
        Session::flash('danger', 'No autorizado para realizar la venta');
        return redirect()->back();
    }
    $nombre = $persona->nom_per;
    $apellido = $persona->app_per;
    $id_persona = $persona->id;
    $persona = $nombre.' '.$apellido;

        /*$persona = [
        'nombre'=>$persona->nom_per,
        'apellido'=>$persona->app_per,
        'id_persona'=>$persona->id
        ];*/        
        $tipopagos = Tipopago::orderBy('id','DESC')->pluck('tipopago','id');

        $clientes = Client::orderBy('id','DESC')->get();
        $carrito = Carrito::orderBy('id','ASC')->get();
        $productos = Product::orderBy('id','DESC')->get();
        $services = Service::orderBy('id','DESC')->get(); 
        return view('admin.venta.create',array(
            'fecha'=>$carbon,
            'clientes'=>$clientes,
            'persona'=>$persona,
            'id_personal'=>$id_persona,
            'tipopagos'=>$tipopagos,
            'productos'=>$productos,
            'carrito'=>$carrito,
            'services'=>$services,
            'secuencial'=>$secuencial,
            'fechaventa'=>$fechaventa
            ));
    }

    public function listall()
    {
        $carrito = Carrito::orderBy('id','ASC')->get();
        $total = Carrito::sum('total');

        $iva = Iva::where('status', 1)->first();
        $iva_valor=$iva->valor;
        $iva_mostrar = ($iva_valor*1);
        $mult = $iva_valor+100;
        $iva_final = $mult/100;

        $subtotal = ($total/$iva_final);
        $valor_con_iva = ($total-$subtotal);
        /*$totales = array(
        'total'=>$total,
        'iva'=>$valor_con_iva,
        'subtotal'=>$subtotal,
        'ivavalor'=>$iva_mostrar
        );*/
        return view('admin/venta/list-cartitems', compact('carrito'),array(
            'total' =>  $total,
            'iva' =>  $valor_con_iva,
            'subtotal' =>  $subtotal,
            'ivavalor' =>  $iva_mostrar
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function saveItem($product, $order_id)
    {
        $requestData = new Venta_item;
        $requestData->producto = $product->nomproducto;
        $requestData->codbarra = $product->codbarra;
        $requestData->precio = $product->precio;
        $requestData->cant = $product->cantidad;
        $requestData->total = $product->total;
        $requestData->id_venta = $order_id;
        $requestData->id_producto = $product->idproducto;
        return $requestData;
    }

    public function actualizaInventario($order_id)
    {
        $the_pedido = Venta_item::select('id_producto','cant')->where('id_venta',$order_id)->get();
        foreach ($the_pedido as $item) {
            $obj= Product::find($item->id_producto);
            if(!is_null($obj)){
                $cant=$obj->cant;
                $cantidad=$item->cant;
                $new_cant=$cantidad-$cant;
                if($new_cant<0){
                    $new_cant=$cant-$cantidad;
                }
                $obj->cant=$new_cant;
                $obj->update();
            }
        }
    }

    public function store(Request $request)
    {
        $rules = [
        'secuencial' => 'required|max:35',
        'id_cliente' => 'required',
        'id_tipopagos' => 'required',
        'numerofactura' => 'max:35',
        'claveacceso' => 'max:35',
        'total' => 'double:15,2',
        'subtotal' => 'double:15,2',
        'valorconiva' => 'double:15,2',
        'valorsiniva' => 'double:15,2',
        'valorcondescuento' => 'double:15,2',
        'responsable' => 'max:35',
        'cantidad_items' => 'max:5'
        ];
        $messages = [
        'secuencial.max'=>'Ha alcanzado la capacidad máxima de caracteres',
        'secuencial.required'=>'No se ha generado un numero secuencial, este es obligatorio',
        'id_cliente.required'=>'No se ha seleccionado el cliente, seleccione el cliente',
        'id_tipopagos.required'=>'No se ha seleccionado el tipo de pago, seleccione el tipo de pago'
        ];

        $res = $this->validate($request, $rules, $messages);
        $producto = Carrito::get();
        $iva = Iva::where('status', 1)->first();
        $id_iva = $iva->id;

        $items = Carrito::count();
        $total = Carrito::sum('total');
    //$total_save = str_replace(',', '.', $total);

        $iva_valor=$iva->valor;
        $iva_mostrar = ($iva_valor*1);
        $mult = $iva_valor+100;
        $iva_final = $mult/100;

        $subtotal = ($total/$iva_final);
        $valor_con_iva = ($total-$subtotal);

        $responsable_id = \Auth::id();
        $personal_id = Personal::where('id_user', $responsable_id)->first();
        $personal=$personal_id->id;
        $vendedor=$request->vendedor;

        $venta = Ventum::create([
            'secuencial'=>$request->secuencial,
            'numerofactura'=>$request->secuencial,
            'claveacceso'=>$request->secuencial,
            'total'=>number_format($total,2),
            'subtotal'=>number_format($subtotal,2),
            'valorconiva'=>number_format($valor_con_iva,2),
            'valorsiniva'=>number_format($subtotal,2),
            'valorcondescuento'=>0,
            'fecha_venta'=>$request->fechaventa,
            'responsable'=>$vendedor,
            'cantidad_items'=>$items,
            'id_iva'=>$id_iva,
            'id_descuento'=>'1',
            'id_cliente'=>$request->id_cliente,
            'id_vendedor'=>$personal,
            'id_tipopago'=>$request->id_tipopagos,
            'id_estadopago'=>'2',
            'status'=>'1',
            ]);

        foreach ($producto as $product) {
            $requestData_returned = $this->saveItem($product,$venta->id);
            $requestData_returned->save();
        }

        $this->actualizaInventario($venta->id);


        Session::flash('seccess', 'Venta registrada correctamente!');

        return redirect('admin/venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ventum = Ventum::findOrFail($id);

        return view('admin.venta.show', compact('ventum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ventum = Ventum::findOrFail($id);

        return view('admin.venta.edit', compact('ventum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
         'secuencial' => 'max:35',
         'numerofactura' => 'max:35',
         'claveacceso' => 'max:35',
         'total' => 'double:15,2',
         'subtotal' => 'double:15,2',
         'valorconiva' => 'double:15,2',
         'valorsiniva' => 'double:15,2',
         'valorcondescuento' => 'double:15,2',
         'responsable' => 'max:35',
         'cantidad_items' => 'max:5'
         ]);
        $requestData = $request->all();
        
        $ventum = Ventum::findOrFail($id);
        $ventum->update($requestData);

        Session::flash('flash_message', 'Ventum updated!');

        return redirect('admin/venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Ventum::destroy($id);

        Session::flash('flash_message', 'Ventum deleted!');

        return redirect('admin/venta');
    }
}
