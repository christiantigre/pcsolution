<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Canton;
use Illuminate\Http\Request;
use Session;

class CantonController extends Controller
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
            $canton = Canton::where('canton', 'LIKE', "%$keyword%")
				->orWhere('iso', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('provincia_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $canton = Canton::orderBy('id','DESC')->get(); 
        }

        return view('admin.canton.index', compact('canton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.canton.create');
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
			'canton' => 'max:35',
			'iso' => 'max:15'
		]);
        $requestData = $request->all();
        
        Canton::create($requestData);

        Session::flash('flash_message', 'Canton added!');

        return redirect('admin/canton');
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
        $canton = Canton::findOrFail($id);

        return view('admin.canton.show', compact('canton'));
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
        $canton = Canton::findOrFail($id);

        return view('admin.canton.edit', compact('canton'));
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
			'canton' => 'max:35',
			'iso' => 'max:15'
		]);
        $requestData = $request->all();
        
        $canton = Canton::findOrFail($id);
        $canton->update($requestData);

        Session::flash('flash_message', 'Canton updated!');

        return redirect('admin/canton');
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
        Canton::destroy($id);

        Session::flash('flash_message', 'Canton deleted!');

        return redirect('admin/canton');
    }
}
