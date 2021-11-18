<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membresia;
class MembresiaController extends Controller
{
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
 {
 //
 $membresias=Membresia::orderBy('id','ASC')->paginate(3);
 return view('Membresia.index',compact('membresias'));
 }
 /**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function create()
 {
 //
 return view('Membresia.create');
 }
 /**
 * Store a newly created resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
 public function store(Request $request)
 {
    //
    $this->validate($request,[ 'fecha_expedicion'=>'required', 'fecha_expiracion'=>'required',
     'id_clie'=>'required']);
     Membresia::create($request->all());
     return redirect()->route('membresia.index')->with('success','Registro creado satisfactoriamente');
 }
 /**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function show($id)
 {
 $membresias=Membresia::find($id);
 return view('membresia.show',compact('membresias'));
 }
 /**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function edit($id)
 {
 //
 $membresia=membresia::find($id);
 return view('membresia.edit',compact('membresia'));
 }
 /**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function update(Request $request, $id) {
 //
 $this->validate($request,[ 'fecha_expedicion'=>'required', 'fecha_expiracion'=>'required',
'id_cli'=>'required']);
 membresia::find($id)->update($request->all());
 return redirect()->route('membresia.index')->with('success','Registro actualizado
satisfactoriamente');
 }
 /**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function destroy($id)
 {
 //
 Membresia::find($id)->delete();
 return redirect()->route('membresia.index')->with('success','Registro eliminado satisfactoriamente');
 }
 /**
 * Ejemplo de método REST
 *
 * @return \Illuminate\Http\Response
 */
 public function getMembresias(){
 $membresias=Membresia::all();
 return response()->json($membresias);
 }
}