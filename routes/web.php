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

	Route::resource('/admin/orders','Admin\OrderController');
	Route::get('admin/orders/print/{id}','Admin\OrderController@print');
	Route::get('admin/orders/edit/{id}','Admin\OrderController@edit');
	Route::get('admin/listorder','Admin\OrderController@listall');
	Route::get('admin/pdf/{id}','Admin\OrderController@print');

	//Route::get('/order','Admin\OrderController');
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('estados', 'EstadosController');
Route::resource('admin/estados', 'Admin\\EstadosController');
Route::resource('admin/estados', 'Admin\\EstadosController');
Route::resource('admin/marcas', 'Admin\\MarcasController');