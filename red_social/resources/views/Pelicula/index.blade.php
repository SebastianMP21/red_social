@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Peli</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('pelicula.create') }}" class="btn btn-info" >Rentar Pelicula</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>ID</th>
                                <th>nombre</th>
                                <th>director</th>
                                <th>artista1</th>
                                <th>artista2</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @if($peliculas->count())
                                @foreach($peliculas as $pelicula)
                                <tr>
                                    <td>{{$pelicula->id}}</td>
                                    <td>{{$pelicula->nombre}}</td>
                                    <td>{{$pelicula->director}}</td>
                                    <td>{{$pelicula->artista1}}</td>
                                    <td>{{$pelicula->artista2}}</td>     
                                    
                                    <td><a class="btn btn-primary btn-xs" href="{{action('App\Http\Controllers\PeliculaController@edit', $pelicula->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                    <td>
                                        <form action="{{action('App\Http\Controllers\PeliculaController@destroy', $pelicula->id)}}" method="post">
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
                {{ $peliculas->links() }}
            </div>
        </div>
    </section>
</div>
@endsection