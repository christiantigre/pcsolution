<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Articulo;
use App\Marca;
use App\Estado;
use Carbon\Carbon;
use Input;
use Session;
use Illuminate\Support\Facades\Auth;

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
        $ci_cli = $request->input('ci_cli');
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
        $registro->tlfncli = $tlfn;
        $registro->celcli = $cel;
        $registro->mailcli = $mail;
        $registro->id_cliente = $idcliente;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
