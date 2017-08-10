<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Provincium;
use App\Pai;
use Illuminate\Http\Request;
use Session;

class ProvinciaController extends Controller
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
            $provincia = Provincium::where('provincia', 'LIKE', "%$keyword%")
            ->orWhere('iso', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->orWhere('pais_id', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $provincia = Provincium::orderBy('id','DESC')->get(); 
        }

        return view('admin.provincia.index', compact('provincia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       $country = Pai::orderBy('id','DESC')->pluck('pais','id');
       return view('admin.provincia.create',array('country'=>$country));
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
         'provincia' => 'max:35',
         'iso' => 'max:15'
         ]);
        $requestData = $request->all();
        
        Provincium::create($requestData);

        Session::flash('flash_message', 'Provincium added!');

        return redirect('admin/provincia');
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
        $provincium = Provincium::findOrFail($id);

        return view('admin.provincia.show', compact('provincium'));
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
        $provincium = Provincium::findOrFail($id);

        return view('admin.provincia.edit', compact('provincium'));
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
         'provincia' => 'max:35',
         'iso' => 'max:15'
         ]);
        $requestData = $request->all();
        
        $provincium = Provincium::findOrFail($id);
        $provincium->update($requestData);

        Session::flash('flash_message', 'Provincium updated!');

        return redirect('admin/provincia');
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
        Provincium::destroy($id);

        Session::flash('flash_message', 'Provincium deleted!');

        return redirect('admin/provincia');
    }
}
