<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ventum;
use Illuminate\Http\Request;
use Session;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.venta.create');
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
