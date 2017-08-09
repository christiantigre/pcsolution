<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Carbon\Carbon;
use Input;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id','DESC')->get();
        return view('adminlte::layouts.client.index',compact('clients'));
    }

    public function listall()
    {
        $clients = Client::orderBy('id','DESC')->get();

        return view('adminlte::layouts.client.list-client', compact('clients'));
    }

    public function buscarcliente(Request $request){
        if ($request->ajax()) {
            $cliente = Client::orderBy('id','DESC')->where('ci_cli',$request->id)->first();
            return response()->json($cliente);
        }
    }

    public function buscarclientepornombre(Request $request){
        if ($request->ajax()) {
            $cliente = Client::orderBy('id','DESC')->where('nom_cli',$request->id)->first();
            return response()->json($cliente);
        }
    }
    public function buscarclientepormail(Request $request){
        if ($request->ajax()) {
            $cliente = Client::orderBy('id','DESC')->where('mail',$request->id)->first();
            return response()->json($cliente);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('adminlte::layouts.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
        'ci_cli' => 'nullable|numeric|max:9999999999',
        'ruc_cli' => 'nullable|numeric|max:999999999999999',
        'tlfn' => 'nullable|numeric|max:99999999999999',
        'cel' => 'nullable|numeric|max:999999999999999',
        'mail'=>'nullable|unique:clients'
        ];

        $messages = [
        'ci_cli.numeric'=>'Caractér invalido',
        'ci_cli.max'=>'Limite eccedido en caracteres',
        'ruc_cli.max'=>'Limite eccedido en caracteres',
        'ruc_cli.numeric'=>'Caractér invalido',
        'tlfn.max'=>'Limite eccedido en caracteres',
        'tlfn.numeric'=>'Caractér invalido',
        'cel.max'=>'Limite eccedido en caracteres',
        'cel.numeric'=>'Caractér invalido',
        'mail.unique'=>'El correo electronico ya esta en uso'
        ];

        $res = $this->validate($request, $rules, $messages);
        $fechanac = $request->input('fecha_nac');
        $fecha = Carbon::parse($fechanac)->format('Y-m-d');

        $requestData = new Client;
        $requestData->nom_cli = $request->nom_cli;
        $requestData->app_cli = $request->app_cli;
        $requestData->ci_cli = $request->ci_cli;
        $requestData->ruc_cli = $request->ruc_cli;
        $requestData->fecha_nac = $fecha;
        $requestData->tlfn = $request->tlfn;
        $requestData->dir = $request->dir;
        $requestData->cel = $request->cel;
        $requestData->mail = $request->mail;
        $requestData->status = $request->status;

        if($requestData->save()){
            Session::flash('flash_message', $request->nom_cli.' Registrado correctamente!');

            return redirect('admin/clients');
        }else{
            Session::flash('flash_message', 'Error al guardar!');

            return redirect('admin/clients');

        }

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
        $cliente = Client::find($id);
        if(!empty($cliente->fecha_nac)){           
            $fecha_nacimiento = $cliente->fecha_nac;
            $diff = Carbon::createFromFormat('Y-m-d',$fecha_nacimiento);
            $final = $hoy->diffInYears($diff);
        }else{
            $final = "";
        }
        //$date = Carbon::createFromDate(1970,19,12)->age;
        return view('adminlte::layouts.client.show',compact('cliente','final'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Client::FindOrFail($id);
        $fecha = $cliente->fecha_nac;
        $fecha_nac = Carbon::parse($cliente->fecha_nac)->format('d-m-Y');
        $cliente->fecha_nac =$fecha_nac;

        return view('adminlte::layouts.client.edit', array('cliente'=>$cliente));
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
        $rules = [
        'ci_cli' => 'nullable|numeric|max:9999999999',
        'ruc_cli' => 'nullable|numeric|max:999999999999999',
        'tlfn' => 'nullable|numeric|max:99999999999999',
        'cel' => 'nullable|numeric|max:999999999999999'
        ];

        $messages = [
        'ci_cli.numeric'=>'Caractér invalido',
        'ci_cli.max'=>'Limite eccedido en caracteres',
        'ruc_cli.max'=>'Limite eccedido en caracteres',
        'ruc_cli.numeric'=>'Caractér invalido',
        'tlfn.max'=>'Limite eccedido en caracteres',
        'tlfn.numeric'=>'Caractér invalido',
        'cel.max'=>'Limite eccedido en caracteres',
        'cel.numeric'=>'Caractér invalido'
        ];

        $res = $this->validate($request, $rules, $messages);

        $input  = $request->fecha_nac;
        $fecha_nac = Carbon::parse($input)->format('Y-m-d');

        $cliente = Client::findOrFail($id);
        $cliente->nom_cli = $request->nom_cli;
        $cliente->app_cli = $request->app_cli;
        $cliente->ci_cli = $request->ci_cli;
        $cliente->ruc_cli = $request->ruc_cli;
        $cliente->fecha_nac = $fecha_nac;
        $cliente->tlfn = $request->tlfn;
        $cliente->cel = $request->cel;
        $cliente->dir = $request->dir;
        $cliente->mail = $request->mail;
        $cliente->status = $request->status;
        $cliente->save();
        Session::flash('success', $request->nom_cli.' Actualizado correctamente');
        return redirect('admin/clients'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Client::find($id);
        $cliente->delete();
        return back()->with('info','Cliente '.$cliente->nom_cli.' eliminado');
    }
}
