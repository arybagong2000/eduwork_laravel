<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class UpdateKlickBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            $barang->klick = rand(0, 100);
            $barang->save();
        }
    }
}