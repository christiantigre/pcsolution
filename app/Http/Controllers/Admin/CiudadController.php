<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ciudad;
use App\Provincium;
use Illuminate\Http\Request;
use Session;

class CiudadController extends Controller
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
            $ciudad = Ciudad::where('ciudad', 'LIKE', "%$keyword%")
            ->orWhere('iso', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->orWhere('provincia_id', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $ciudad = Ciudad::paginate($perPage);
        }

        return view('admin.ciudad.index', compact('ciudad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
     $provincias = Provincium::orderBy('id','DESC')->pluck('provincia','id');
     return view('admin.ciudad.create',array('provincias'=>$provincias));
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
         'ciudad' => 'max:35',
         'iso' => 'max:15'
         ]);
        $requestData = $request->all();
        
        Ciudad::create($requestData);

        Session::flash('flash_message', 'Ciudad added!');

        return redirect('admin/ciudad');
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
        $ciudad = Ciudad::findOrFail($id);

        return view('admin.ciudad.show', compact('ciudad'));
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
        $ciudad = Ciudad::findOrFail($id);

        return view('admin.ciudad.edit', compact('ciudad'));
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
         'ciudad' => 'max:35',
         'iso' => 'max:15'
         ]);
        $requestData = $request->all();
        
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->update($requestData);

        Session::flash('flash_message', 'Ciudad updated!');

        return redirect('admin/ciudad');
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
        Ciudad::destroy($id);

        Session::flash('flash_message', 'Ciudad deleted!');

        return redirect('admin/ciudad');
    }
}
