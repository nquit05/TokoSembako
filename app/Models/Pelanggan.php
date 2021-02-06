<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggan';
    public $primaryKey = 'id';
    protected $fillable = [
        'nama', 'alamat', 'notelp',
    ];
}
