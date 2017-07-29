<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empres;
use Input;
use Image;
use Session;

class EmpresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empress = Empres::orderBy('id','DESC')->get();
        return view('adminlte::layouts.empres.index',compact('empress'));
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
        $empress = Empres::FindOrFail($id);
        return view('adminlte::layouts.empres.edit', array('empress'=>$empress));
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
        $file = Input::file('logo');
        $filesld = Input::file('iso_logotipo');
        if (!empty($file)) {
            $random = str_random(10);
            $nombre = $random.' - '.$file->getClientOriginalName();
            $path = public_path('uploads/empresa/'.$nombre);
            $url = '/uploads/empresa/'.$nombre;
            $image = Image::make($file->getRealPath());
            $image->resize(600, 300);
            if($image->save($path)){
                $empresa = Empres::findOrFail($id);    
                $empresa->nom_local = $request->nom_local;
                $empresa->nom_prop = $request->nom_prop;
                $empresa->app_prop = $request->app_prop;
                $empresa->ci_prop = $request->ci_prop;
                $empresa->ruc_prop = $request->ruc_prop;
                $empresa->tlfn = $request->tlfn;
                $empresa->logo = 'uploads/empresa/'.$nombre;
                $empresa->cel_movi = $request->cel_movi;
                $empresa->cel_claro = $request->cel_claro;
                $empresa->mail = $request->mail;
                $empresa->dir = $request->dir;
                $empresa->area_especializacion = $request->area_especializacion;
                $empresa->descripcion = $request->descripcion;
                $empresa->fax = $request->fax;
                $empresa->link_web = $request->link_web;
                $empresa->fb = $request->fb;
                $empresa->tw = $request->tw;
                $empresa->gog = $request->gog;
                $empresa->likein = $request->likein;
                $empresa->slogan = $request->slogan;
                $empresa->save();
                Session::flash('success', $request->nom_local.' Actualizado correctamente');
                return redirect('admin/empres'); 
            }else{
                Session::flash('danger', $request->nom_local.' No se pudo subir la imagen');
                return redirect('admin/empres'); 
            }           
        }
        if (!empty($filesld)) {
            $randoms = str_random(10);
            $nombres = $randoms.' - '.$filesld->getClientOriginalName();
            $paths = public_path('uploads/empresa/'.$nombres);
            $url = '/uploads/empresa/'.$nombres;
            $images = Image::make($filesld->getRealPath());
            $images->resize(600, 300);
            if($images->save($paths)){    
                $empresa = Empres::findOrFail($id);    
                $empresa->nom_local = $request->nom_local;
                $empresa->nom_prop = $request->nom_prop;
                $empresa->app_prop = $request->app_prop;
                $empresa->ci_prop = $request->ci_prop;
                $empresa->ruc_prop = $request->ruc_prop;
                $empresa->tlfn = $request->tlfn;
                $empresa->iso_logotipo = 'uploads/empresa/'.$nombres;
                $empresa->cel_movi = $request->cel_movi;
                $empresa->cel_claro = $request->cel_claro;
                $empresa->mail = $request->mail;
                $empresa->dir = $request->dir;
                $empresa->area_especializacion = $request->area_especializacion;
                $empresa->descripcion = $request->descripcion;
                $empresa->fax = $request->fax;
                $empresa->link_web = $request->link_web;
                $empresa->fb = $request->fb;
                $empresa->tw = $request->tw;
                $empresa->gog = $request->gog;
                $empresa->likein = $request->likein;
                $empresa->slogan = $request->slogan;
                $empresa->save();
                Session::flash('success', $request->nom_local.' Actualizado correctamente');
                return redirect('admin/empres'); 
            }else{
                Session::flash('danger', $request->nom_local.' No se pudo subir la imagen');
                return redirect('admin/empres'); 
            }           
        }
        if((empty($file))||(empty($filesld))){   
            $empresa = Empres::findOrFail($id);    
            $empresa->nom_local = $request->nom_local;
            $empresa->nom_prop = $request->nom_prop;
            $empresa->app_prop = $request->app_prop;
            $empresa->ci_prop = $request->ci_prop;
            $empresa->ruc_prop = $request->ruc_prop;
            $empresa->tlfn = $request->tlfn;
            $empresa->cel_movi = $request->cel_movi;
            $empresa->cel_claro = $request->cel_claro;
            $empresa->mail = $request->mail;
            $empresa->dir = $request->dir;
            $empresa->area_especializacion = $request->area_especializacion;
            $empresa->descripcion = $request->descripcion;
            $empresa->fax = $request->fax;
            $empresa->link_web = $request->link_web;
            $empresa->fb = $request->fb;
            $empresa->tw = $request->tw;
            $empresa->gog = $request->gog;
            $empresa->likein = $request->likein;
            $empresa->slogan = $request->slogan;
            $empresa->save();
            Session::flash('success', $request->nom_local.' Actualizado correctamente');
            return redirect('admin/empres');
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
