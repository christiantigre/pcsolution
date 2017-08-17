<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EstadoCivil;
use Illuminate\Http\Request;
use Session;

class EstadoCivilController extends Controller
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
            $estadocivil = EstadoCivil::where('estado_civil', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $estadocivil = EstadoCivil::paginate($perPage);
        }

        return view('admin.estado-civil.index', compact('estadocivil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.estado-civil.create');
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
        
        $requestData = $request->all();
        
        EstadoCivil::create($requestData);

        Session::flash('flash_message', 'EstadoCivil added!');

        return redirect('admin/estado-civil');
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
        $estadocivil = EstadoCivil::findOrFail($id);

        return view('admin.estado-civil.show', compact('estadocivil'));
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
        $estadocivil = EstadoCivil::findOrFail($id);

        return view('admin.estado-civil.edit', compact('estadocivil'));
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
        
        $requestData = $request->all();
        
        $estadocivil = EstadoCivil::findOrFail($id);
        $estadocivil->update($requestData);

        Session::flash('flash_message', 'EstadoCivil updated!');

        return redirect('admin/estado-civil');
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
        EstadoCivil::destroy($id);

        Session::flash('flash_message', 'EstadoCivil deleted!');

        return redirect('admin/estado-civil');
    }
}
