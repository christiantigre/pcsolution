<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proveedor;
use App\Pai;
use App\Provincium;
use App\Canton;
use Illuminate\Http\Request;
use Session;

class ProveedorController extends Controller
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
            $proveedor = Proveedor::where('nom_pro', 'LIKE', "%$keyword%")
            ->orWhere('app_pro', 'LIKE', "%$keyword%")
            ->orWhere('dir', 'LIKE', "%$keyword%")
            ->orWhere('tlfn', 'LIKE', "%$keyword%")
            ->orWhere('cel_movi', 'LIKE', "%$keyword%")
            ->orWhere('cel_claro', 'LIKE', "%$keyword%")
            ->orWhere('fax', 'LIKE', "%$keyword%")
            ->orWhere('mail', 'LIKE', "%$keyword%")
            ->orWhere('web', 'LIKE', "%$keyword%")
            ->orWhere('ruc', 'LIKE', "%$keyword%")
            ->orWhere('representante', 'LIKE', "%$keyword%")
            ->orWhere('actividad', 'LIKE', "%$keyword%")
            ->orWhere('logo', 'LIKE', "%$keyword%")
            ->orWhere('id_pais', 'LIKE', "%$keyword%")
            ->orWhere('id_provincia', 'LIKE', "%$keyword%")
            ->orWhere('id_ciudad', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $proveedor = Proveedor::orderBy('id','DESC')->get(); 
        }

        return view('admin.proveedor.index', compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pais = Pai::orderBy('id','DESC')->pluck('pais','id');
        $provincias = Provincium::orderBy('id','DESC')->pluck('provincia','id');
        $cantones = Canton::orderBy('id','DESC')->pluck('canton','id');
        return view('admin.proveedor.create',array(
            'paises'=>$pais,
            'provincias'=>$provincias,
            'cantones'=>$cantones
            ));
    }

    public function buscarrucproveedor(Request $request){
        if ($request->ajax()) {
            $proveedor = Proveedor::orderBy('id','DESC')->where('ruc',$request->id)->first();
            return response()->json($proveedor);
        }
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
           'nom_pro' => 'max:35',
           'app_pro' => 'max:35',
           'dir' => 'max:150'
           ]);
        $requestData = $request->all();
        
        Proveedor::create($requestData);

        Session::flash('flash_message', 'Proveedor added!');

        return redirect('admin/proveedor');
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
        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedor.show', compact('proveedor'));
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
        $paises = Pai::orderBy('id','DESC')->pluck('pais','id');
        $provincias = Provincium::orderBy('id','DESC')->pluck('provincia','id');
        $cantones = Canton::orderBy('id','DESC')->pluck('canton','id');

        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedor.edit', compact('proveedor','paises','provincias','cantones'));
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
           'nom_pro' => 'max:35',
           'app_pro' => 'max:35',
           'dir' => 'max:150'
           ]);
        $requestData = $request->all();
        
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($requestData);

        Session::flash('flash_message', 'Proveedor updated!');

        return redirect('admin/proveedor');
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
        Proveedor::destroy($id);

        Session::flash('flash_message', 'Proveedor deleted!');

        return redirect('admin/proveedor');
    }
}
