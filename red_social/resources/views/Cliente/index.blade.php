@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Clientes</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('cliente.create') }}" class="btn btn-info" >Agregar Cliente</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>id_client</th>
                                <th>nombre</th>
                                <th>ap_paterno</th>
                                <th>ap_materno</th>
                                <th>fecha_nac</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @if($clientes->count())
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id_client}}</td>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->ap_paterno}}</td>
                                    <td>{{$cliente->ap_materno}}</td>
                                    <td>{{$cliente->fecha_nac}}</td>    
                                    
                                    <td><a class="btn btn-primary btn-xs" href="{{action('App\Http\Controllers\ClienteController@edit', $cliente->id_client)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>

                                    <td>
                                        <form action="{{action('App\Http\Controllers\ClienteController@destroy', $pcliente->id_client)}}" method="post">
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
                {{ $clientes->links() }}
            </div>
        </div>
    </section>
</div>
@endsection