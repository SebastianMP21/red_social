<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    //
    protected $fillable =['id','nombre','director','genero','artista1','artista2'];
    public $timestamps = false;
    
}
