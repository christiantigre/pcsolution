<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tipopago;
use Illuminate\Http\Request;
use Session;

class TipopagoController extends Controller
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
            $tipopago = Tipopago::where('tipopago', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $tipopago = Tipopago::paginate($perPage);
        }

        return view('admin.tipopago.index', compact('tipopago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tipopago.create');
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
			'tipopago' => 'max:60'
		]);
        $requestData = $request->all();
        
        Tipopago::create($requestData);

        Session::flash('flash_message', 'Tipo pago added!');

        return redirect('admin/tipopago');
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
        $tipopago = Tipopago::findOrFail($id);

        return view('admin.tipopago.show', compact('tipopago'));
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
        $tipopago = Tipopago::findOrFail($id);

        return view('admin.tipopago.edit', compact('tipopago'));
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
			'tipopago' => 'max:60'
		]);
        $requestData = $request->all();
        
        $tipopago = Tipopago::findOrFail($id);
        $tipopago->update($requestData);

        Session::flash('flash_message', 'Tipopago updated!');

        return redirect('admin/tipopago');
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
        Tipopago::destroy($id);

        Session::flash('flash_message', 'Tipopago deleted!');

        return redirect('admin/tipopago');
    }
}
