<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $fillable = [
        'transaksi_id', 'barang_id', 'harga', 'jumlah',
    ];
}
