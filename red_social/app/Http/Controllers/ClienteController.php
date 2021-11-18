<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::orderBy('id_client','DESC')->paginate(3);
        return view('cliente.index',compact('clientes')); 
    } 

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'id_client'=>'required', 'nombre'=>'required', 'ap_paterno'=>'required', 'ap_materno'=>'required', 'fecha_nac'=>'required']);
        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('succes','Cliente registrado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes=Cliente::find($id);
        return view('cliente.show',compact('clientes'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('cliente.show',compact('cliente'));
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
        $this->validate($request,[ 'id_client'=>'required', 'nombre'=>'required', 'ap_paterno'=>'required', 'ap_materno'=>'required', 'fecha_nac'=>'required']);
        Cliente::find($id)->update($request->all());
        return redirect()->route('cliente.index')->with('success','Registro actualizado exitosamente');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //
        Cliente::find($id)->delete();
        return redirect()->route('cliente.index')->with('success','Registro eliminado');
    }

}
