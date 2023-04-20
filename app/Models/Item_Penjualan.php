<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Penjualan extends Model
{
    // use HasFactory;
    protected $table = 'item_penjualan';
    protected $fillable = ['id', 'NOTA', 'KODE_BARANG', 'QTY'];
}
