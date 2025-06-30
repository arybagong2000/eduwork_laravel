<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'katagori_id',
        'nama',
        'gambar',
        'thumbnail', 
        'deskripsi',
        'stock',
    ];

    public function katagori()
    {
        return $this->belongsTo(BarangKatagori::class, 'katagori_id');
    }
}