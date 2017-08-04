<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repuestos;
use Carbon\Carbon;
use App\Marca;
use App\Estado;
use App\Order;
use App\Articulo;
use App\Abonos;

class RepuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function saveGasto(Request $request){
        if ($request->ajax()) {
            $hoy = Carbon::now();
            $date = Carbon::parse($hoy)->format('Y-m-d');
            $repuestos = new Repuestos;
            $repuestos->repuesto = $request->input('repuesto');
            $repuestos->valor = $request->input('valor');
            $repuestos->id_orden = $request->input('id');

            if ($repuestos->save()) {
                return response()->json(["mensaje"=>"Registrado con exito","data"=>$repuestos]);
            }else{
                return "error al guardar";
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $repuesto = Repuestos::FindOrFail($id);

        return view('adminlte::layouts.repuestos.edit',array(
            'repuesto'=>$repuesto
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

        $repuesto = Repuestos::findOrFail($id);    
        $repuesto->valor = $request->valor;
        $repuesto->repuesto = $request->repuesto;
        $repuesto->id_orden = $request->id_orden;
        if ($repuesto->update()) {            

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
            $ordenes = Order::orderBy('id','DESC')->where('id',$repuesto->id_orden)->first();
            $tot_abonos = \DB::table('abonos')
            ->where('id_orden', $repuesto->id_orden)
            ->sum('abono');
            $anticipo = $ordenes->anticipo;
            $repuestos = Repuestos::orderBy('id','DESC')->where('id_orden',$request->id_orden)->get();
            
            

            $valor_reparacion = $ordenes->valor;
            $suma_anti_abono = $tot_abonos+$anticipo;
            $pre_final = $valor_reparacion-$suma_anti_abono;
            //$orden = Order::orderBy('id','DESC')->where('id',$id)->first();
            $orden = Order::findOrFail($request->id_orden);
            $abonos = Abonos::orderBy('id','DESC')->where('id_orden',$request->id_orden)->get();
            $nombre = $orden->nomcli.' '.$orden->appcli;

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
                'nombre'=>$nombre,
                'abonos'=>$abonos,
                'tot_abonos'=>$tot_abonos,
                'pre_final'=>$pre_final,
                'repuestos'=>$repuestos
                ));
        }else{
            return "error al guardar";
        }
    }


    public static function generate_numbers($start, $count, $digits) {
       $result = array();
       for ($n = $start; $n < $start + $count; $n++) {
          $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
      }
      return $result;
  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repuesto = Repuestos::find($id);
        $repuesto->delete();
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
            //$orden = Order::orderBy('id','DESC')->where('id',$id)->first();
        $orden = Order::findOrFail($repuesto->id_orden);
        $nombre = $orden->nomcli.' '.$orden->appcli;
        $abonos = Abonos::orderBy('id','DESC')->where('id_orden',$orden->id)->get();
        $ordenes = Order::orderBy('id','DESC')->where('id',$orden->id)->first();
        
        $tot_abonos = \DB::table('abonos')
        ->where('id_orden', $orden->id)
        ->sum('abono');
        
        $anticipo = $ordenes->anticipo;

        $valor_reparacion = $ordenes->valor;
        $suma_anti_abono = $tot_abonos+$anticipo;
        $pre_final = $valor_reparacion-$suma_anti_abono;

        $sec = $orden->num_secuencial;
        $hoy = Carbon::now();
        $date = Carbon::parse($hoy)->format('Y-m-d');
        $cambio_fecha = $orden->fecha_reparacion;
        $date2 = Carbon::parse($cambio_fecha)->format('d-m-Y');
        $repuestos = Repuestos::orderBy('id','DESC')->where('id_orden',$repuesto->id_orden)->get();

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
            'nombre'=>$nombre,
            'abonos'=>$abonos,
            'repuestos'=>$repuestos,
            'pre_final'=>$pre_final
            ));
    }
}
