<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Parroquium;
use Illuminate\Http\Request;
use Session;

class ParroquiaController extends Controller
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
            $parroquia = Parroquium::where('parroquia', 'LIKE', "%$keyword%")
				->orWhere('iso', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('canton_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $parroquia = Parroquium::orderBy('id','DESC')->get(); 
        }

        return view('admin.parroquia.index', compact('parroquia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.parroquia.create');
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
			'parroquia' => 'max:35',
			'iso' => 'max:15'
		]);
        $requestData = $request->all();
        
        Parroquium::create($requestData);

        Session::flash('flash_message', 'Parroquium added!');

        return redirect('admin/parroquia');
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
        $parroquium = Parroquium::findOrFail($id);

        return view('admin.parroquia.show', compact('parroquium'));
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
        $parroquium = Parroquium::findOrFail($id);

        return view('admin.parroquia.edit', compact('parroquium'));
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
			'parroquia' => 'max:35',
			'iso' => 'max:15'
		]);
        $requestData = $request->all();
        
        $parroquium = Parroquium::findOrFail($id);
        $parroquium->update($requestData);

        Session::flash('flash_message', 'Parroquium updated!');

        return redirect('admin/parroquia');
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
        Parroquium::destroy($id);

        Session::flash('flash_message', 'Parroquium deleted!');

        return redirect('admin/parroquia');
    }
}
