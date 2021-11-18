<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas=Pelicula::orderBy('id','ASC')->paginate(3);
        return view('Pelicula.index',compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pelicula.create');
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
        $this->validate($request,['nombre'=>'required','director'=>'required','genero'=>'required','artista1'=>'required','artista2'=>'required']);
        Pelicula::create($request->all());
        return redirect()->route('pelicula.index')->with('succes','Pelicula registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peliculas=Pelicula::find($id);
        return view('pelicula.show',compact('peliculas'));  
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
        $pelicula=Pelicula::find($id);
        return view('pelicula.edit',compact('pelicula'));
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
        $this->validate($request,['nombre'=>'required','director'=>'required','genero'=>'required','artista1'=>'required','artista2'=>'required']);
        Pelicula::find($id)->update($request->all());
        return redirect()->route('pelicula.index')->with('success','Pelicula actualizado exitosamente');
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
        Pelicula::find($id)->delete();
        return redirect()->route('pelicula.index')->with('success','Registro eliminado');
    } 
    /**
     * * Ejemplo de método REST
     * *
     * * @return \Illuminate\Http\Response
     * */
    public function getPelicula(){
        $pelicula=Pelicula::all();
        return response()->json($pelicula);
        }
}
