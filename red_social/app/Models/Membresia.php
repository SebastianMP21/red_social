<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $fillable = ['id_membresia','fecha_expedicion','fecha_expiracion','id_clie'];
    public $timestamps = false;
}
