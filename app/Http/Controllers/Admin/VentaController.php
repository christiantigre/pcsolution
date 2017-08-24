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
    public function create()
    {
        $carbon = new Carbon();
        $carbon  = Carbon::now(new \DateTimeZone('America/Guayaquil'));
        $logueado = \Auth::id();
        $persona = Personal::orderBy('id','DESC')->where('id_user',$logueado)->first();
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
        return view('admin.venta.create',array(
            'fecha'=>$carbon,
            'clientes'=>$clientes,
            'persona'=>$persona,
            'id_personal'=>$id_persona,
            'tipopagos'=>$tipopagos,
            'productos'=>$productos,
            'carrito'=>$carrito
            ));
    }

    public function listall()
    {
        $carrito = Carrito::orderBy('id','ASC')->get();
        return view('admin/venta/list-cartitems', compact('carrito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
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
        
        Ventum::create($requestData);

        Session::flash('flash_message', 'Ventum added!');

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
