@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista Rentas</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('renta.create') }}" class="btn btn-info" >Añadir Renta</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>id_renta</th>
                                <th>fecha_registro</th>
                                <th>fecha_devolucion</th>
                                <th>fecha_entrega</th>
                                <th>id_peli</th>
                                <th>id_cli</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @if($rentas->count())
                                @foreach($rentas as $renta)
                                <tr>
                                    <td>{{$renta->id_renta}}</td>
                                    <td>{{$renta->fecha_registro}}</td>
                                    <td>{{$renta->fecha_devolucion}}</td>
                                    <td>{{$renta->fecha_entrega}}</td>
                                    <td>{{$renta->id_peli}}</td>
                                    <td>{{$renta->id_cli}}</td>
                                    
                                    <td><a class="btn btn-primary btn-xs" href="{{action('App\Http\Controllers\RentaController@edit', $renta->id_renta)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                    <td>
                                        <form action="{{action('App\Http\Controllers\RentaController@destroy', $renta->id_renta)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphico
                                            glyphicon-trash"></span></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8">No hay registro !!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $rentas->links() }}
            </div>
        </div>
    </section>
</div>
@endsection