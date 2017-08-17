<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Genero;
use Illuminate\Http\Request;
use Session;

class GeneroController extends Controller
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
            $genero = Genero::where('genero', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $genero = Genero::paginate($perPage);
        }

        return view('admin.genero.index', compact('genero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.genero.create');
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
        
        Genero::create($requestData);

        Session::flash('flash_message', 'Genero added!');

        return redirect('admin/genero');
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
        $genero = Genero::findOrFail($id);

        return view('admin.genero.show', compact('genero'));
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
        $genero = Genero::findOrFail($id);

        return view('admin.genero.edit', compact('genero'));
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
        
        $genero = Genero::findOrFail($id);
        $genero->update($requestData);

        Session::flash('flash_message', 'Genero updated!');

        return redirect('admin/genero');
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
        Genero::destroy($id);

        Session::flash('flash_message', 'Genero deleted!');

        return redirect('admin/genero');
    }
}
