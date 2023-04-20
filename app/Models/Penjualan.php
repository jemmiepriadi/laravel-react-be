<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    // use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = ['ID_NOTA', 'TGL', 'KODE_PENJUALAN', 'SUBTOTAL'];
    protected $primaryKey = 'ID_NOTA';
    
    // public function setDateFormat($value)
    // {
    //     $this->attributes('TGL') = Carbon
    // }
}
