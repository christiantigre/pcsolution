<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estadopago;
use Illuminate\Http\Request;
use Session;

class EstadopagoController extends Controller
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
            $estadopago = Estadopago::where('estadopago', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $estadopago = Estadopago::paginate($perPage);
        }

        return view('admin.estadopago.index', compact('estadopago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.estadopago.create');
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
			'estadopago' => 'max:15'
		]);
        $requestData = $request->all();
        
        Estadopago::create($requestData);

        Session::flash('flash_message', 'Estadopago added!');

        return redirect('admin/estadopago');
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
        $estadopago = Estadopago::findOrFail($id);

        return view('admin.estadopago.show', compact('estadopago'));
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
        $estadopago = Estadopago::findOrFail($id);

        return view('admin.estadopago.edit', compact('estadopago'));
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
			'estadopago' => 'max:15'
		]);
        $requestData = $request->all();
        
        $estadopago = Estadopago::findOrFail($id);
        $estadopago->update($requestData);

        Session::flash('flash_message', 'Estadopago updated!');

        return redirect('admin/estadopago');
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
        Estadopago::destroy($id);

        Session::flash('flash_message', 'Estadopago deleted!');

        return redirect('admin/estadopago');
    }
}
