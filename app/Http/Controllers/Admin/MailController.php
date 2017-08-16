<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Mail\Correos;
use App\Proveedor;
use App\Empres;
use Session;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mails.mail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendtest()
    {
        Mail::to('andrescondo17@gmail.com')->send(new Correos());
    }

    public function create($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('mails.index',compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $empress = Empres::findOrFail(1);
        $empresa = [
        'tlfn' => $empress->tlfn,
        'cel_movi' => $empress->cel_movi,
        'cel_claro' => $empress->cel_claro,
        'mail' => $empress->mail,
        'area_especializacion' => $empress->area_especializacion,
        'logo' => $empress->logo,
        'link_web' => $empress->link_web,
        'fb' => $empress->fb,
        'tw' => $empress->tw,
        'gog' => $empress->gog
        ];

        $proveedor = Proveedor::findOrFail($request->id);
        
        $content = [
        'title'=> $request->asunto, 
        'body'=> $request->mensaje,
        'pro_empress'=> $proveedor->empresa,
        'name'=> 'PcSolutions',
        'address'=> $proveedor->mail
        ];

        
        if(($request->mail)==''){
            Session::flash('danger', 'No se pudo enviar el mensaje');
        }else{
            try {                
                Session::flash('success', 'Mensaje enviado correctamente a '.$proveedor->empresa);           
                Mail::to($request->mail)->send(new Correos($content,$empresa));
            } catch (Exception $e) {
                Session::flash('danger', 'Error '.$e);   
            }
        }
        
        return redirect('/admin/product/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
