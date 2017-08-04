<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;
use Session;
use Image;
use Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $product = Product::orderBy('id','DESC')->get();      
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
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
        $rules = [
        'catalogo' => 'max:1',
        'pre_com'=>'numeric',
        'pre_ven'=>'numeric',
        'codbarra'=>'unique:products',
        'cant' => 'numeric|min:1|max:10000'
        ];

        $messages = [
        'pre_com.numeric'=>'Caractér invalido',
        'pre_ven.numeric'=>'Caractér invalido',
        'codbarra.unique:products'=>'Este codigo de barra ya esta en uso.',
        'cant.numeric'=>'Cantidad incorrecta',
        'cant.max'=>'Cantidad fuera de rango permitido',
        ];

        $file = Input::file('img');
        if(empty($file)){
            $url = "";
            $requestData_returned = $this->guarda_producto($request,$url);
            $requestData_returned->save();
            Session::flash('flash_message', 'Producto agregado!');
            return redirect('admin/product');
        }else{


            $random = str_random(10);
            $nombre = $random.' - '.$file->getClientOriginalName();
            $path = public_path('uploads/productos/'.$nombre);
            $url = '/uploads/productos/'.$nombre;
            $image = Image::make($file->getRealPath());
            $image->resize(640, 400);

            if($image->save($path)){
                $this->validate($request, $rules, $messages);
                $requestData_returned = $this->guarda_producto($request,$url);                              $requestData_returned->save();
                Session::flash('flash_message', 'Producto agregado!');
                return redirect('admin/product');
            }else{
                Session::flash('flash_message', 'Ocurrio un error al subir la imagen al servidor!');
                return redirect('admin/product');
            }
        }
    }

    public static function guarda_producto($request, $url){
        $requestData = new Product;
        $requestData->nombre = $request->nombre;
        $requestData->slug = $request->slug;
        $requestData->codbarra = $request->codbarra;
        $requestData->cant = $request->cant;
        $requestData->pre_ven = $request->pre_ven;
        $requestData->pre_com = $request->pre_com;
        $requestData->img = $url;
        $requestData->prgr_tittle = $request->prgr_tittle;
        $requestData->nuevo = $request->nuevo;
        $requestData->promocion = $request->promocion;
        $requestData->catalogo = $request->catalogo;
        $requestData->is_active = $request->is_active;
        $requestData->articulo_id = $request->articulo_id;
        $requestData->marca_id = $request->marca_id;

        return $requestData;
    }
    public static function update_producto($request, $url, $id){
        if(empty($url)){
            $requestData = Product::findOrFail($id);
            $requestData->nombre = $request->nombre;
            $requestData->slug = $request->slug;
            $requestData->codbarra = $request->codbarra;
            $requestData->cant = $request->cant;
            $requestData->pre_ven = $request->pre_ven;
            $requestData->pre_com = $request->pre_com;
            $requestData->prgr_tittle = $request->prgr_tittle;
            $requestData->nuevo = $request->nuevo;
            $requestData->promocion = $request->promocion;
            $requestData->catalogo = $request->catalogo;
            $requestData->is_active = $request->is_active;
            $requestData->articulo_id = $request->articulo_id;
            $requestData->marca_id = $request->marca_id;
            return $requestData;
        }else{
            $requestData = Product::findOrFail($id);
            $requestData->nombre = $request->nombre;
            $requestData->slug = $request->slug;
            $requestData->codbarra = $request->codbarra;
            $requestData->cant = $request->cant;
            $requestData->pre_ven = $request->pre_ven;
            $requestData->pre_com = $request->pre_com;
            $requestData->img = $url;
            $requestData->prgr_tittle = $request->prgr_tittle;
            $requestData->nuevo = $request->nuevo;
            $requestData->promocion = $request->promocion;
            $requestData->catalogo = $request->catalogo;
            $requestData->is_active = $request->is_active;
            $requestData->articulo_id = $request->articulo_id;
            $requestData->marca_id = $request->marca_id;
            return $requestData;
        }
        
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
        $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product'));
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
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('product'));
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
        $rules = [
        'catalogo' => 'max:1',
        'pre_com'=>'numeric',
        'pre_ven'=>'numeric',
        'cant' => 'numeric|min:1|max:10000'
        ];

        $messages = [
        'pre_com.numeric'=>'Caractér invalido',
        'pre_ven.numeric'=>'Caractér invalido',
        'cant.numeric'=>'Cantidad incorrecta',
        'cant.max'=>'Cantidad fuera de rango permitido',
        ];

        $file = Input::file('img');
        if(empty($file)){
            $url = "";
            $requestData_returned = $this->update_producto($request,$url,$id);
            $requestData_returned->update();
            Session::flash('flash_message', 'Producto agregado!');
            return redirect('admin/product');
        }else{


            $random = str_random(10);
            $nombre = $random.' - '.$file->getClientOriginalName();
            $path = public_path('uploads/productos/'.$nombre);
            $url = '/uploads/productos/'.$nombre;
            $image = Image::make($file->getRealPath());
            $image->resize(640, 400);

            if($image->save($path)){
                $this->validate($request, $rules, $messages);
                $requestData_returned = $this->update_producto($request,$url,$id);                              $requestData_returned->update();
                Session::flash('flash_message', 'Producto agregado!');
                return redirect('admin/product');
            }else{
                Session::flash('flash_message', 'Ocurrio un error al subir la imagen al servidor!');
                return redirect('admin/product');
            }
        }
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
        Product::destroy($id);

        Session::flash('flash_message', 'Product deleted!');

        return redirect('admin/product');
    }
}
