<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['ID_PELANGGAN', 'NAMA', 'DOMISILI','JENIS_KELAMIN'];
    protected $primaryKey = 'ID_PELANGGAN';
}
