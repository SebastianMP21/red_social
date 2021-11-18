<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class renta extends Model
{
    protected $fillable =['id_renta','fecha_registro','fecha_devolucion','fecha_entrega','id_peli','id_cli'];
    public $timestamps = false;
}
