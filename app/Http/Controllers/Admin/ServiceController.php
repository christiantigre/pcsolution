<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;
use Illuminate\Http\Request;
use Session;

class ServiceController extends Controller
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
            $service = Service::where('nombre', 'LIKE', "%$keyword%")
            ->orWhere('codbarra', 'LIKE', "%$keyword%")
            ->orWhere('cant', 'LIKE', "%$keyword%")
            ->orWhere('pre_com', 'LIKE', "%$keyword%")
            ->orWhere('pre_ven', 'LIKE', "%$keyword%")
            ->orWhere('img', 'LIKE', "%$keyword%")
            ->orWhere('prgr_tittle', 'LIKE', "%$keyword%")
            ->orWhere('nuevo', 'LIKE', "%$keyword%")
            ->orWhere('promocion', 'LIKE', "%$keyword%")
            ->orWhere('catalogo', 'LIKE', "%$keyword%")
            ->orWhere('is_active', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $service = Service::paginate($perPage);
        }

        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {        
        $contador = Service::count();
        $contadorinc = $contador + 1;
        $numbers = $this->generate_numbers($contadorinc, 1, 6);
        $arraynumber = implode("", $numbers);
        return view('admin.service.create',array('numbers'=>$arraynumber));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public static function generate_numbers($start, $count, $digits) {
       $result = array();
       for ($n = $start; $n < $start + $count; $n++) {
          $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
      }
      return $result;
  }

  public function store(Request $request)
  {
    $rules = ['nombre' => 'max:35',
    'codbarra' => 'unique:services|max:35',
    'cant' => 'max:5',
    'pre_ven' => 'max:8,2',
    'pre_com' => 'max:8,2',
    'img' => 'max:300',
    'prgr_tittle' => 'max:300',
    'nuevo' => 'max:1',
    'promocion' => 'max:1',
    'catalogo' => 'max:1'];

    $messages = [
    'nombre.max'=>'Ha alcanzado la capacidad máxima de caracteres',
    'codbarra.max'=>'Ha alcanzado la capacidad máxima de caracteres',
    'codbarra.unique'=>'El cadigo ingresado ya esta en uso',
    'pre_ven.max'=>'Error de formato',
    'pre_com.max'=>'Error de formato',
    'codbarra.max'=>'Ha alcanzado la capacidad máxima de caracteres',
    'prgr_tittle.max'=>'Ha alcanzado la capacidad máxima de caracteres'
    ];

   

    $requestData = $request->all();

    Service::create($requestData);

    Session::flash('flash_message', 'Service added!');

    return redirect('admin/service');
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
        $service = Service::findOrFail($id);

        return view('admin.service.show', compact('service'));
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
        $service = Service::findOrFail($id);

        return view('admin.service.edit', compact('service'));
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
        $rules = ['nombre' => 'max:35',
        'codbarra' => 'unique:services|max:35',
        'cant' => 'max:5',
        'pre_ven' => 'max:8,2',
        'pre_com' => 'max:8,2',
        'img' => 'max:300',
        'prgr_tittle' => 'max:300',
        'nuevo' => 'max:1',
        'promocion' => 'max:1',
        'catalogo' => 'max:1'];

        $messages = [
        'nombre.max'=>'Ha alcanzado la capacidad máxima de caracteres',
        'codbarra.max'=>'Ha alcanzado la capacidad máxima de caracteres',
        'codbarra.unique'=>'El cadigo ingresado ya esta en uso',
        'pre_ven.max'=>'Error de formato',
        'pre_com.max'=>'Error de formato',
        'codbarra.max'=>'Ha alcanzado la capacidad máxima de caracteres',
        'prgr_tittle.max'=>'Ha alcanzado la capacidad máxima de caracteres'
        ];

        //$this->validate($request, [          ]);

        $res = $this->validate($request, $rules, $messages);
        $requestData = $request->all();
        
        $service = Service::findOrFail($id);
        $service->update($requestData);

        Session::flash('flash_message', 'Service updated!');

        return redirect('admin/service');
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
        Service::destroy($id);

        Session::flash('flash_message', 'Service deleted!');

        return redirect('admin/service');
    }
}
