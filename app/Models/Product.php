<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'gambar',
        'kategori',
        'stock',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}