<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cargo;
use App\Departamento;
use Illuminate\Http\Request;
use Session;

class CargoController extends Controller
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
            $cargo = Cargo::where('cargo', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('departamento_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $cargo = Cargo::paginate($perPage);
        }

        return view('admin.cargo.index', compact('cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departamento = Departamento::orderBy('id','DESC')->pluck('departamento','id');
        return view('admin.cargo.create',compact('departamento'));
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
			'cargo' => 'max:35'
		]);
        $requestData = $request->all();
        
        Cargo::create($requestData);

        Session::flash('flash_message', 'Cargo added!');

        return redirect('admin/cargo');
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
        $cargo = Cargo::findOrFail($id);

        return view('admin.cargo.show', compact('cargo'));
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
        $cargo = Cargo::findOrFail($id);
        $departamento = Departamento::orderBy('id','DESC')->pluck('departamento','id');
        return view('admin.cargo.edit', compact('cargo','departamento'));
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
			'cargo' => 'max:35'
		]);
        $requestData = $request->all();
        
        $cargo = Cargo::findOrFail($id);
        $cargo->update($requestData);

        Session::flash('flash_message', 'Cargo updated!');

        return redirect('admin/cargo');
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
        Cargo::destroy($id);

        Session::flash('flash_message', 'Cargo deleted!');

        return redirect('admin/cargo');
    }
}
