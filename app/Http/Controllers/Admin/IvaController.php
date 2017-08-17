<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Iva;
use Illuminate\Http\Request;
use Session;

class IvaController extends Controller
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
            $iva = Iva::where('valor', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $iva = Iva::paginate($perPage);
        }

        return view('admin.iva.index', compact('iva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.iva.create');
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
			'valor' => 'required'
		]);
        $requestData = $request->all();
        
        Iva::create($requestData);

        Session::flash('flash_message', 'Iva added!');

        return redirect('admin/iva');
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
        $iva = Iva::findOrFail($id);

        return view('admin.iva.show', compact('iva'));
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
        $iva = Iva::findOrFail($id);

        return view('admin.iva.edit', compact('iva'));
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
			'valor' => 'required'
		]);
        $requestData = $request->all();
        
        $iva = Iva::findOrFail($id);
        $iva->update($requestData);

        Session::flash('flash_message', 'Iva updated!');

        return redirect('admin/iva');
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
        Iva::destroy($id);

        Session::flash('flash_message', 'Iva deleted!');

        return redirect('admin/iva');
    }
}
