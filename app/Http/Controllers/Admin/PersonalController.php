<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Personal;
use Illuminate\Http\Request;
use Session;
use App\Pai;
use App\User;
use App\Provincium;
use App\Canton;
use App\Cargo;
use App\Genero;
use App\EstadoCivil;
use Carbon\Carbon;
use Input;
use Image;

class PersonalController extends Controller
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
            $personal = Personal::where('nom_per', 'LIKE', "%$keyword%")
            ->orWhere('app_per', 'LIKE', "%$keyword%")
            ->orWhere('dir', 'LIKE', "%$keyword%")
            ->orWhere('tlfn', 'LIKE', "%$keyword%")
            ->orWhere('cel_movi', 'LIKE', "%$keyword%")
            ->orWhere('cel_claro', 'LIKE', "%$keyword%")
            ->orWhere('id_pais', 'LIKE', "%$keyword%")
            ->orWhere('id_provincia', 'LIKE', "%$keyword%")
            ->orWhere('id_canton', 'LIKE', "%$keyword%")
            ->orWhere('id_cargo', 'LIKE', "%$keyword%")
            ->orWhere('id_user', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $personal = Personal::paginate($perPage);
        }

        return view('admin.personal.index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $paises = Pai::orderBy('id','DESC')->pluck('pais','id');
        $provincias = Provincium::orderBy('id','DESC')->pluck('provincia','id');
        $cantones = Canton::orderBy('id','DESC')->pluck('canton','id');
        $cargos = Cargo::orderBy('id','DESC')->pluck('cargo','id');
        $generos = Genero::orderBy('id','DESC')->pluck('genero','id');
        $estadocivils = EstadoCivil::orderBy('id','DESC')->pluck('estado_civil','id');
        return view('admin.personal.create',compact('paises','provincias','cantones','cargos','generos','estadocivils'));
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
         'nom_per' => 'max:35',
         'app_per' => 'max:35',
         'dir' => 'max:150'
         ]);
        $requestData = $request->all();
        $fechanac = $request->input('fecha_nac');
        $fecha_nacimiento = Carbon::parse($fechanac)->format('Y-m-d');
        $file = Input::file('foto');

        $fields = [
        'name'     => $request->nom_per,
        'email'    => $request->mail,
        'password' => bcrypt($request->mail),
        ];

        if (!empty($file)) {
         $random = str_random(10);
         $nombre = $random.' - '.$file->getClientOriginalName();
         $path = public_path('uploads/personal/'.$nombre);
         $url = '/uploads/personal/'.$nombre;
         $image = Image::make($file->getRealPath());
         $image->resize(600, 300);
         if($image->save($path)){
            $foto = 'uploads/personal/'.$nombre;
        }
        $Data = $this->crea_personal($request,$fields,$foto,$fecha_nacimiento);
    }
    if(empty($file)){
        $foto = "";
        $Data = $this->crea_personal($request,$fields,$foto,$fecha_nacimiento);
    }

    Personal::create($Data);

    Session::flash('flash_message', 'Personal registrado!');

    return redirect('admin/personal');
}

public static function crea_personal($request,$fields, $foto, $fecha_nacimiento){
    if(empty($foto)){
        $usuario = User::create($fields);
        $Data = [
        'nom_per' => $request->nom_per,
        'app_per' => $request->app_per,
        'dir' => $request->dir,
        'tlfn' => $request->tlfn,
        'cedula' => $request->cedula,
        'pasaporte' => $request->pasaporte,
        'cel_movi' => $request->cel_movi,
        'cel_claro' => $request->cel_claro,
        'hijos' => $request->hijos,
        'fecha_nac' => $fecha_nacimiento,
        'id_pais' => $request->id_pais,
        'id_provincia' => $request->id_provincia,
        'id_canton' => $request->id_canton,
        'id_cargo' => $request->id_cargo,
        'id_estadocivil' => $request->id_estadocivil,
        'id_user' => $usuario->id,
        'status' => $request->status,
        'mail' => $usuario->email
        ];
        return $Data;
    }else{
        $usuario = User::create($fields);
        $Data = [
        'nom_per' => $request->nom_per,
        'app_per' => $request->app_per,
        'dir' => $request->dir,
        'tlfn' => $request->tlfn,
        'cedula' => $request->cedula,
        'pasaporte' => $request->pasaporte,
        'cel_movi' => $request->cel_movi,
        'cel_claro' => $request->cel_claro,
        'hijos' => $request->hijos,
        'fecha_nac' => $fecha_nacimiento,
        'id_pais' => $request->id_pais,
        'id_provincia' => $request->id_provincia,
        'id_canton' => $request->id_canton,
        'id_cargo' => $request->id_cargo,
        'id_estadocivil' => $request->id_estadocivil,
        'id_user' => $usuario->id,
        'foto' => $foto,
        'status' => $request->status,
        'mail' => $usuario->email
        ];
        return $Data;
    }
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
        $personal = Personal::findOrFail($id);

        return view('admin.personal.show', compact('personal'));
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
        $personal = Personal::findOrFail($id);
        $paises = Pai::orderBy('id','DESC')->pluck('pais','id');
        $provincias = Provincium::orderBy('id','DESC')->pluck('provincia','id');
        $cantones = Canton::orderBy('id','DESC')->pluck('canton','id');
        $cargos = Cargo::orderBy('id','DESC')->pluck('cargo','id');
        $generos = Genero::orderBy('id','DESC')->pluck('genero','id');
        $estadocivils = EstadoCivil::orderBy('id','DESC')->pluck('estado_civil','id');

        $cambio_fecha = $personal->fecha_nac;
        $date2 = Carbon::parse($cambio_fecha)->format('d-m-Y');
        
        return view('admin.personal.edit', compact(
            'personal','paises','provincias','cantones','cargos','date2','generos','estadocivils'));
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
         'nom_per' => 'max:35',
         'app_per' => 'max:35',
         'dir' => 'max:150'
         ]);
        $requestData = $request->all();
        $fechanac = $request->input('fecha_nac');
        $fecha_nacimiento = Carbon::parse($fechanac)->format('Y-m-d');
        $file = Input::file('foto');
        if (!empty($file)) {
         $random = str_random(10);
         $nombre = $random.' - '.$file->getClientOriginalName();
         $path = public_path('uploads/personal/'.$nombre);
         $url = '/uploads/personal/'.$nombre;
         $image = Image::make($file->getRealPath());
         $image->resize(600, 300);
         if($image->save($path)){
            $foto = 'uploads/personal/'.$nombre;
        }
        $personal = $this->actualiza_personal($request,$foto,$fecha_nacimiento,$id);
    }
    if(empty($file)){
        $foto = "";
        $personal = $this->actualiza_personal($request,$foto,$fecha_nacimiento,$id);
    }   
    $personal->update();

    Session::flash('flash_message', 'Personal Actualizado!');

    return redirect('admin/personal');
}

public static function actualiza_personal($request, $foto, $fecha_nacimiento,$id){
    if(empty($foto)){
        $personal = Personal::findOrFail($id);
        $personal->nom_per = $request->nom_per;
        $personal->app_per = $request->app_per;
        $personal->dir = $request->dir;
        $personal->tlfn = $request->tlfn;
        $personal->cel_movi = $request->cel_movi;
        $personal->cel_claro = $request->cel_claro;
        $personal->id_genero = $request->id_genero;
        $personal->id_estadocivil = $request->id_estadocivil;
        $personal->hijos = $request->hijos;
        $personal->fecha_nac = $fecha_nacimiento;
        $personal->id_pais = $request->id_pais;
        $personal->id_provincia = $request->id_provincia;
        $personal->id_canton = $request->id_canton;
        $personal->id_cargo = $request->id_cargo;
        $personal->id_user = $request->id_user;
        $personal->status = $request->status;
        $personal->mail = $request->mail;
        $personal->cedula = $request->cedula;
        $personal->pasaporte = $request->pasaporte;
        return $personal;
    }else{
        $personal = Personal::findOrFail($id);
        $personal->nom_per = $request->nom_per;
        $personal->app_per = $request->app_per;
        $personal->dir = $request->dir;
        $personal->tlfn = $request->tlfn;
        $personal->cel_movi = $request->cel_movi;
        $personal->cel_claro = $request->cel_claro;
        $personal->id_genero = $request->id_genero;
        $personal->id_estadocivil = $request->id_estadocivil;
        $personal->hijos = $request->hijos;
        $personal->fecha_nac = $fecha_nacimiento;
        $personal->id_pais = $request->id_pais;
        $personal->id_provincia = $request->id_provincia;
        $personal->id_canton = $request->id_canton;
        $personal->id_cargo = $request->id_cargo;
        $personal->id_user = $request->id_user;
        $personal->foto = $request->foto;
        $personal->status = $request->status;
        $personal->mail = $request->mail;
        $personal->cedula = $request->cedula;
        $personal->pasaporte = $request->pasaporte;
        $personal->foto = $foto;
        return $personal;
    }
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
        Personal::destroy($id);

        Session::flash('flash_message', 'Persona Eliminada correctamente, se procedera a finalizar la sessión!');

        return redirect('admin/personal');
    }
}
