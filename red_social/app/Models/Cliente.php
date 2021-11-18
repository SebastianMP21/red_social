<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $fillable = ['id_client','nombre','ap_paterno','ap_materno','fech_nac'];
    public $timestamps = false;
}
