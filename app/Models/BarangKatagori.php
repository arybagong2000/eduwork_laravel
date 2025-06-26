<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKatagori extends Model
{
    use HasFactory;

    protected $table = 'barang_katagori';

    protected $fillable = [
        'nama',
        'keterangan',
        'status',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'katagori_id');
    }
}