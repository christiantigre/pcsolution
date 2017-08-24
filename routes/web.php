<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::get('/admin', function () {
	return redirect('/home');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/admin/orders','Admin\OrderController');

	Route::resource('/admin/clients','Admin\ClientController');
	Route::get('/admin/client/buscar','Admin\ClientController@buscarcliente');
	Route::get('/admin/client/buscarpornombre','Admin\ClientController@buscarclientepornombre');
	Route::get('/admin/client/buscarpormail','Admin\ClientController@buscarclientepormail');
	Route::get('admin/listclient','Admin\ClientController@listall');

	Route::resource('/admin/empres','Admin\EmpresController');
	Route::get('/admin/edit/empress/{id}','Admin\EmpresController@edit');
	Route::get('/admin/orders/delete/{id}','Admin\EmpresController@destroy');
	Route::get('/admin/abonos/delete/{id}','Admin\AbonosController@destroy');
	Route::get('/admin/repuestos/delete/{id}','Admin\RepuestosController@destroy');

	Route::resource('/admin/orders','Admin\OrderController');
	Route::resource('/admin/abonos','Admin\AbonosController');
	Route::resource('/admin/repuestos','Admin\RepuestosController');
	Route::post('/admin/repuestos/saveGasto','Admin\RepuestosController@saveGasto');
	Route::post('/admin/orders/saveOrden','Admin\OrderController@saveOrden');
	Route::get('admin/orders/print/{id}','Admin\OrderController@print');
	Route::get('admin/orders/edit/{id}','Admin\OrderController@edit');
	Route::get('admin/listorder','Admin\OrderController@listall');
	Route::get('admin/pdf/{id}','Admin\OrderController@print');

	Route::resource('admin/posts', 'Admin\\PostsController');
	Route::resource('estados', 'EstadosController');
	Route::resource('admin/estados', 'Admin\\EstadosController');
	Route::resource('admin/marcas', 'Admin\\MarcasController');
	Route::resource('admin/product', 'Admin\\ProductController');
	Route::resource('admin/mail', 'Admin\\MailController');
	Route::get('admin/crear/{id}', 'Admin\\MailController@create');
	Route::get('admin/sendMail', 'Admin\\MailController@sendtest');
	Route::post('/admin/mail/store','Admin\MailController@store');


	Route::get('admin/product/importEcxel','Admin\ProductController@importEcxel');
	Route::get('importExport', 'Admin\ProductController@importExport');
	Route::get('downloadExcel/{type}', 'Admin\ProductController@downloadExcel');
	Route::post('importExcel', 'Admin\ProductController@importExcel');

	Route::resource('admin/articles', 'Admin\\ArticlesController');
	Route::resource('admin/pais', 'Admin\\PaisController');
	Route::get('PaisdownloadExcel/{type}', 'Admin\PaisController@downloadExcel');
	Route::post('PaisimportExcel', 'Admin\PaisController@importExcel');

	Route::resource('admin/provincia', 'Admin\\ProvinciaController');
	Route::resource('admin/ciudad', 'Admin\\CiudadController');
	Route::resource('admin/proveedor', 'Admin\\ProveedorController');
	Route::get('admin/products/buscaproveedorruc','Admin\ProveedorController@buscarrucproveedor');
	Route::get('admin/products/buscaproveedorempresa','Admin\ProveedorController@buscarempresaproveedor');
	Route::get('admin/products/buscaproveedormail','Admin\ProveedorController@buscarmailproveedor');
	Route::resource('admin/canton', 'Admin\\CantonController');
	Route::resource('admin/parroquia', 'Admin\\ParroquiaController');
	Route::resource('admin/iva', 'Admin\\IvaController');

	Route::resource('admin/departamento', 'Admin\\DepartamentoController');
	Route::resource('admin/cargo', 'Admin\\CargoController');
	Route::resource('admin/personal', 'Admin\\PersonalController');
	Route::resource('admin/genero', 'Admin\\GeneroController');
	Route::resource('admin/estado-civil', 'Admin\\EstadoCivilController');
	
	Route::resource('admin/descuento', 'Admin\\DescuentoController');
	Route::resource('admin/venta', 'Admin\\VentaController');
	Route::resource('admin/tipopago', 'Admin\\TipopagoController');
	Route::resource('admin/estadopago', 'Admin\\EstadopagoController');
	Route::get('admin/getproducts/','Admin\VentaController@getproducts');
	Route::get('admin/getclientes/','Admin\VentaController@getclientes');
	Route::get('admin/extraerdatoscli/','Admin\VentaController@extraerdatoscliente');

	Route::post('admin/venta/addItem/','Admin\VentaController@addItem');
	Route::get('admin/listcartitems/','Admin\VentaController@listall');
	//Route::get('/order','Admin\OrderController');
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});