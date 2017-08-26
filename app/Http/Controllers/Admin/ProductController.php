<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Articulo;
use App\Marca;
use Illuminate\Http\Request;
use Session;
use Image;
use Input;
/*use Maatwebsite\Excel\Facades\Excel as Excel;*/
use App\Item;
use DB;
use Excel;

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
        $articulos = Articulo::orderBy('id','DESC')->pluck('articulo','id');
        $marcas = Marca::orderBy('id','DESC')->pluck('marca','id');
        return view('admin.product.create',array(
            'articulos'=>$articulos,
            'marcas'=>$marcas
            ));
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
        'codbarra'=>'unique:products|max:99999999999999999999',
        'cant' => 'numeric|min:1|max:10000',
        'proveedor_id'=>'required'
        ];

        $messages = [
        'pre_com.numeric'=>'Caractér invalido',
        'pre_ven.numeric'=>'Caractér invalido',
        'codbarra.unique:products'=>'Este codigo de barra ya esta en uso.',
        'cant.numeric'=>'Cantidad incorrecta',
        'cant.max'=>'Cantidad fuera de rango permitido',
        'proveedor_id.required'=>'Seleccionar un proveedor es obligatorio',
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
                $requestData_returned = $this->guarda_producto($request,$url);
                $requestData_returned->save();
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
        $requestData->proveedor_id = $request->proveedor_id;

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
            $requestData->proveedor_id = $request->proveedor_id;
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
            $requestData->proveedor_id = $request->proveedor_id;
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
        $articulos = Articulo::orderBy('id','DESC')->pluck('articulo','id');
        $marcas = Marca::orderBy('id','DESC')->pluck('marca','id');

        return view('admin.product.edit', array('product'=>$product,'articulos'=>$articulos,
            'marcas'=>$marcas));
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
        $producto_foto = Product::findOrFail($id);
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
            if (file_exists($producto_foto->img)) {
             unlink($producto_foto->img);
         }
         $url = '/uploads/productos/'.$nombre;
         $image = Image::make($file->getRealPath());
         $image->resize(640, 400);

         if($image->save($path)){
            $this->validate($request, $rules, $messages);
            $requestData_returned = $this->update_producto($request,$url,$id);                              
            $requestData_returned->update();
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

    public function importExport()
    {
        return view('importExport');
    }
    public function downloadExcel($type)
    {
        $data = Product::get()->toArray();
        return Excel::create('productos', function($excel) use ($data) {
            $excel->sheet('listado', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = \Excel::load($path, function($reader) {
            })->get();
            \DB::table('products')->truncate();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                    'nombre' => $value->nombre, 
                    'slug' => $value->slug,
                    'codbarra' => $value->codbarra,
                    'cant' => $value->cant,
                    'pre_com' => $value->pre_com,
                    'pre_ven' => $value->pre_ven,
                    'img' => $value->img,
                    'prgr_tittle' => $value->prgr_tittle,
                    'nuevo' => $value->nuevo,
                    'promocion' => $value->promocion,
                    'catalogo' => $value->catalogo,
                    'is_active' => $value->is_active,
                    'articulo_id' => $value->articulo_id,
                    'marca_id' => $value->marca_id,
                    'proveedor_id' => $value->proveedor_id,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at
                    ];
                }
                if(!empty($insert)){
                    DB::table('products')->insert($insert);
                    //dd('Insert Record successfully.');
                    Session::flash('success', 'Documento importado con exito!');
                    return redirect('admin/product');
                }
            }
        }
        return back();
    }

    
}
