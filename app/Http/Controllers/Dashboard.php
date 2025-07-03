<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKatagori;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        //$barang = Barang::paginate(5);
        $jml_barang = Barang::count();
        $jml_katagori= BarangKatagori::count();
        $jml_klick= Barang::sum('klick');
        return view('dashboard',compact('jml_barang','jml_katagori','jml_klick'));
        //return Barang::with('katagori')->get();
    }
}
