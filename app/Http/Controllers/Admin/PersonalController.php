<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Personal;
use Illuminate\Http\Request;
use Session;

class PersonalController extends Controller
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
            $personal = Personal::where('nom_per', 'LIKE', "%$keyword%")
				->orWhere('app_per', 'LIKE', "%$keyword%")
				->orWhere('dir', 'LIKE', "%$keyword%")
				->orWhere('tlfn', 'LIKE', "%$keyword%")
				->orWhere('cel_movi', 'LIKE', "%$keyword%")
				->orWhere('cel_claro', 'LIKE', "%$keyword%")
				->orWhere('id_pais', 'LIKE', "%$keyword%")
				->orWhere('id_provincia', 'LIKE', "%$keyword%")
				->orWhere('id_canton', 'LIKE', "%$keyword%")
				->orWhere('id_cargo', 'LIKE', "%$keyword%")
				->orWhere('id_user', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $personal = Personal::paginate($perPage);
        }

        return view('admin.personal.index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.personal.create');
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
			'nom_per' => 'max:35',
			'app_per' => 'max:35',
			'dir' => 'max:150'
		]);
        $requestData = $request->all();
        
        Personal::create($requestData);

        Session::flash('flash_message', 'Personal added!');

        return redirect('admin/personal');
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
        $personal = Personal::findOrFail($id);

        return view('admin.personal.show', compact('personal'));
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
        $personal = Personal::findOrFail($id);

        return view('admin.personal.edit', compact('personal'));
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
			'nom_per' => 'max:35',
			'app_per' => 'max:35',
			'dir' => 'max:150'
		]);
        $requestData = $request->all();
        
        $personal = Personal::findOrFail($id);
        $personal->update($requestData);

        Session::flash('flash_message', 'Personal updated!');

        return redirect('admin/personal');
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
        Personal::destroy($id);

        Session::flash('flash_message', 'Personal deleted!');

        return redirect('admin/personal');
    }
}
