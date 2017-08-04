<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
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
            $product = Product::where('nombre', 'LIKE', "%$keyword%")
            ->orWhere('slug', 'LIKE', "%$keyword%")
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
            ->orWhere('articulo_id', 'LIKE', "%$keyword%")
            ->orWhere('marca_id', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $product = Product::paginate($perPage);
        }

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

        $this->validate($request, $rules, $messages);
        
        $requestData = $request->all();
        
        Product::create($requestData);

        Session::flash('flash_message', 'Producto agregado!');

        return redirect('admin/product');
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
        $this->validate($request, [
         'catalogo' => 'max:1'
         ]);
        $requestData = $request->all();
        
        $product = Product::findOrFail($id);
        $product->update($requestData);

        Session::flash('flash_message', 'Product updated!');

        return redirect('admin/product');
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
