<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Renta;

class RentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentas=Renta::orderBy('id_renta','DESC')->paginate(3);
        return view('Renta.index',compact('rentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Renta.create');
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
        $this->validate($request,['fecha_registro'=>'required','fecha_devolucion'=>'required','fecha_entrega'=>'required','id_peli'=>'required','id_cli'=>'required']);
        Renta::create($request->all());
        return redirect()->route('renta.index')->with('succes','Renta registrado exitosamente');
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
        $rentas=Renta::find($id);
        return view('renta.show',compact('rentas'));  
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
        $renta=Renta::find($id);
        return view('renta.edit',compact('renta'));
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
        $this->validate($request,['fecha_registro'=>'required','fecha_devolucion'=>'required','fecha_entrega'=>'required','id_peli'=>'required','id_cli'=>'required']);
        Renta::find($id)->update($request->all());
        return redirect()->route('renta.index')->with('success','Renta actualizado exitosamente');
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
        Renta::find($id)->delete();
        return redirect()->route('renta.index')->with('success','Renta eliminado');
    }
    /**
     * * Ejemplo de método REST
     * *
     * * @return \Illuminate\Http\Response
     * */
    public function getRenta(){
        $renta=Renta::all();
        return response()->json($renta);
        }
}
