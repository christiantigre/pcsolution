<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Personal;
use Illuminate\Http\Request;
use Session;
use App\Pai;
use App\Provincium;
use App\Canton;
use App\Cargo;
use Carbon\Carbon;
use Input;

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
        return view('admin.personal.create',compact('paises','provincias','cantones','cargos'));
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
        dd($fecha_nacimiento);
        Personal::create($requestData);

        Session::flash('flash_message', 'Personal added!');

        return redirect('admin/personal');
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

        $cambio_fecha = $personal->fecha_nac;
        $date2 = Carbon::parse($cambio_fecha)->format('d-m-Y');
        
        return view('admin.personal.edit', compact(
            'personal','paises','provincias','cantones','cargos','date2'));
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

        $personal = Personal::findOrFail($id);
        $personal->nom_per = $request->nom_per;
        $personal->app_per = $request->app_per;
        $personal->dir = $request->dir;
        $personal->tlfn = $request->tlfn;
        $personal->cel_movi = $request->cel_movi;
        $personal->cel_claro = $request->cel_claro;
        $personal->genero = $request->genero;
        $personal->estado_civil = $request->estado_civil;
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

        $personal->update();

        Session::flash('flash_message', 'Personal updated!');

        return redirect('admin/personal');
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

        Session::flash('flash_message', 'Personal deleted!');

        return redirect('admin/personal');
    }
}
