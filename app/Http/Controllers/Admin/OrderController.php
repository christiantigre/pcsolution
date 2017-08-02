<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Articulo;
use App\Marca;
use App\Estado;
use Carbon\Carbon;
use App\FormatOrden;
use App\Empres;
use Input;
use Session;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();
        return view('adminlte::layouts.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $articulos = Articulo::orderBy('id','DESC')->pluck('articulo','id');
        $marcas = Marca::orderBy('id','DESC')->pluck('marca','id');
        $estados = Estado::orderBy('id','DESC')->pluck('estado','id');
        $carbon = new Carbon();
        //$carbon->timezone = new \DateTimeZone('America/Guayaquil');
        $carbon  = Carbon::now(new \DateTimeZone('America/Guayaquil'));
        
        $fecha_orden = $carbon->now()->format('l j F Y H:i:s');;
        $anio = Carbon::now()->year;
        $contador = Order::count();
        $contadorinc = $contador + 1;
        $numbers = $this->generate_numbers($contadorinc, 1, 6);
        $arraynumber = implode("", $numbers);
        $datos = array([
            'anio' => $anio,
            'numbers' => $numbers,
            ]);
        //$secuencial =$anio.'-'.$numbers;
        
        //$cadena = implode ( "" , $secuencial );
        //$secuencial
        return view('adminlte::layouts.order.create',array(
            'anio'=>$anio,
            'numbers'=>$arraynumber,
            'fecha'=>$carbon,
            'articulos'=>$articulos,
            'marcas'=>$marcas,
            'estados'=>$estados
            ));
    }

    public static function generate_numbers($start, $count, $digits) {
     $result = array();
     for ($n = $start; $n < $start + $count; $n++) {
      $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
  }
  return $result;
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoy = Carbon::now();
        $date = Carbon::parse($hoy)->format('Y-m-d');

        $responsable = Auth::user()->name;
        $fechaorden = $request->input('fechaorden');
        $fecha_orden = Carbon::parse($fechaorden)->format('Y-m-d');
        $secuencia = $request->input('numero');
        $anio = $request->input('anio');
        $id_articulo = $request->input('id_articulo');
        $id_marca = $request->input('id_marca');
        $modelo = $request->input('modelo');
        $serie = $request->input('serie');
        $nom_cli = $request->input('nom_cli');
        $name_cli = $request->input('name_cli');
        $app_cli = $request->input('app_cli');
        $ci_cli = $request->input('cicli');
        $dir_cli = $request->input('dircli');
        $idcliente = $request->input('idcliente');
        $tlfn = $request->input('tlfn');
        $cel = $request->input('cel');
        $mail = $request->input('mail');
        $daterep = $request->input('date_rep');
        $date_rep = Carbon::parse($daterep)->format('Y-m-d');
        $id_estado = $request->input('id_estado');
        $id_estado = $request->input('id_estado');
        $problema = $request->input('problema');
        $notas = $request->input('notas');
        if (empty($request->input('anticipo'))) {
            $anticipo = "0.00";
        }else{
            $anticipo = $request->input('anticipo');
        }
        if (empty($request->input('valor'))) {
            $valor = "0.00";
        }else{
            $valor = $request->input('valor');
        }
        
        $num_secuencial = $anio.'-'.$secuencia;
        $registro = new Order;

        /* Realizamos la asignación masiva */
        $registro->num_secuencial = $num_secuencial;
        $registro->fecha_orden = $fecha_orden;
        $registro->id_articulo = $id_articulo;
        $registro->id_marca = $id_marca;
        $registro->id_estado = $id_estado;
        $registro->modelo = $modelo;
        $registro->serie = $serie;
        $registro->problema_reportado = $problema;
        $registro->notas = $notas;
        $registro->responsable = $responsable;
        $registro->fecha_reparacion = $date_rep;
        $registro->sello = "";
        $registro->nomcli = $name_cli;
        $registro->appcli = $app_cli;
        $registro->cicli = $ci_cli;
        $registro->dircli = $dir_cli;
        $registro->tlfncli = $tlfn;
        $registro->celcli = $cel;
        $registro->mailcli = $mail;
        $registro->id_cliente = $idcliente;
        $registro->anticipo = $anticipo;
        $registro->valor = $valor;
    /**
     * Se repite con los demás datos que desees asignar...
     */
    if ($registro->save()) {
        $orden = Order::orderBy('id','DESC')->where('id',$registro->id)->first();
        return view('adminlte::layouts.order.show',array('orden'=>$orden,'date'=>$date));
    }else{
        return "error al guardar";
    }
    //$registro->save();

    //return "Empresa registrada";
}

public function print($id){    
    $clausulas = FormatOrden::orderBy('id','DESC')->get();
    $hoy = new Carbon();
    $hoy  = Carbon::now(new \DateTimeZone('America/Guayaquil'));
    $orden = Order::orderBy('id','DESC')->where('id',$id)->get();
    $empresa = Empres::orderBy('id','DESC')->where('id',1)->get();
    $pdf = \PDF::loadView('adminlte::layouts.order.comprobante',['orden'=>$orden,'empresa'=>$empresa,'hoy'=>$hoy]);
    $pdf = \PDF::loadView('pdf.comprobante',['orden'=>$orden,'empresa'=>$empresa,'hoy'=>$hoy,'clausulas'=>$clausulas]);

    return $pdf->download('orden-#.pdf');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoy = Carbon::now();
        $date = Carbon::parse($hoy)->format('Y-m-d');
        $orden = Order::orderBy('id','DESC')->where('id',$id)->first();
        return view('adminlte::layouts.order.show',array('orden'=>$orden,'date'=>$date));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {$articulos = Articulo::orderBy('id','DESC')->pluck('articulo','id');
    $marcas = Marca::orderBy('id','DESC')->pluck('marca','id');
    $estados = Estado::orderBy('id','DESC')->pluck('estado','id');
    $carbon = new Carbon();
        //$carbon->timezone = new \DateTimeZone('America/Guayaquil');
    $carbon  = Carbon::now(new \DateTimeZone('America/Guayaquil'));

    $fecha_orden = $carbon->now()->format('l j F Y H:i:s');;
    $anio = Carbon::now()->year;
    $contador = Order::count();
    $contadorinc = $contador + 1;
    $numbers = $this->generate_numbers($contadorinc, 1, 6);
    $arraynumber = implode("", $numbers);
    $datos = array([
        'anio' => $anio,
        'numbers' => $numbers,
        ]);
    $orden = Order::orderBy('id','DESC')->where('id',$id)->first();
    $sec = $orden->num_secuencial;
    $hoy = Carbon::now();
    $date = Carbon::parse($hoy)->format('Y-m-d');
    $cambio_fecha = $orden->fecha_reparacion;
    $date2 = Carbon::parse($cambio_fecha)->format('d-m-Y');

    return view('adminlte::layouts.order.edit',array(
        'anio'=>$anio,
        'numbers'=>$arraynumber,
        'fecha'=>$carbon,
        'articulos'=>$articulos,
        'marcas'=>$marcas,
        'estados'=>$estados,
        'orden'=>$orden,
        'date2'=>$date2,
        'sec'=>$sec,
        ));

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hoy = Carbon::now();
        $date = Carbon::parse($hoy)->format('Y-m-d');

        $responsable = Auth::user()->name;
        $fechaorden = $request->input('fechaorden');
        $fecha_orden = Carbon::parse($fechaorden)->format('Y-m-d');
        $secuencia = $request->input('numero');
        $anio = $request->input('anio');
        $id_articulo = $request->input('id_articulo');
        $id_marca = $request->input('id_marca');
        $modelo = $request->input('modelo');
        $serie = $request->input('serie');
        $nom_cli = $request->input('nomcli');
        $name_cli = $request->input('name_cli');
        $app_cli = $request->input('appcli');
        $ci_cli = $request->input('cicli');
        $dir_cli = $request->input('dircli');
        $idcliente = $request->input('id_cliente');
        $tlfn = $request->input('tlfncli');
        $cel = $request->input('celcli');
        $mail = $request->input('mailcli');
        $daterep = $request->input('date_rep');
        $date_rep = Carbon::parse($daterep)->format('Y-m-d');
        $id_estado = $request->input('id_estado');
        $id_estado = $request->input('id_estado');
        $problema = $request->input('problema_reportado');
        $notas = $request->input('notas');
        if (empty($request->input('anticipo'))) {
            $anticipo = "0.00";
        }else{
            $anticipo = $request->input('anticipo');
        }
        if (empty($request->input('valor'))) {
            $valor = "0.00";
        }else{
            $valor = $request->input('valor');
        }
        
        $num_secuencial = $anio.'-'.$secuencia;
        $registro = Order::findOrFail($id);    

        /* Realizamos la asignación masiva */
        $registro->num_secuencial = $num_secuencial;
        $registro->fecha_orden = $fecha_orden;
        $registro->id_articulo = $id_articulo;
        $registro->id_marca = $id_marca;
        $registro->id_estado = $id_estado;
        $registro->modelo = $modelo;
        $registro->serie = $serie;
        $registro->problema_reportado = $problema;
        $registro->notas = $notas;
        $registro->responsable = $responsable;
        $registro->fecha_reparacion = $date_rep;
        $registro->sello = "";
        $registro->nomcli = $name_cli;
        $registro->appcli = $app_cli;
        $registro->cicli = $ci_cli;
        $registro->dircli = $dir_cli;
        $registro->tlfncli = $tlfn;
        $registro->celcli = $cel;
        $registro->mailcli = $mail;
        $registro->id_cliente = $idcliente;
        $registro->anticipo = $anticipo;
        $registro->valor = $valor;
    /**
     * Se repite con los demás datos que desees asignar...
     */
    if ($registro->update()) {
        $orden = Order::orderBy('id','DESC')->where('id',$registro->id)->first();
        return view('adminlte::layouts.order.show',array('orden'=>$orden,'date'=>$date));
    }else{
        return "error al guardar";
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
