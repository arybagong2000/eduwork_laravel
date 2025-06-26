<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Pastikan kategori sudah ada
        $kategoriIds = DB::table('barang_katagori')->pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('barang')->insert([
                'katagori_id' => $kategoriIds[array_rand($kategoriIds)],
                'nama' => "Barang $i",
                'gambar' => "https://picsum.photos/seed/barang{$i}/300/200",
                'deskripsi' => "Deskripsi barang ke-$i",
                'stock' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}