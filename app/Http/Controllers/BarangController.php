<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(5);
        return view('barangAdmin',compact('barang'));
        //return Barang::with('katagori')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'katagori_id' => 'required|exists:barang_katagori,id',
            'nama'        => 'required|string|max:255',
            'gambar'      => 'required|url',
            'deskripsi'   => 'nullable|string',
            'stock'       => 'required|integer|min:0',
        ]);

        $barang = Barang::create($validated);
        return response()->json($barang->load('katagori'), 201);
    }

    public function show($id)
    {
        $barang = Barang::with('katagori')->findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $validated = $request->validate([
            'katagori_id' => 'required|exists:barang_katagori,id',
            'nama'        => 'required|string|max:255',
            'gambar'      => 'required|url',
            'deskripsi'   => 'nullable|string',
            'stock'       => 'required|integer|min:0',
        ]);
        $barang->update($validated);
        return response()->json($barang->load('katagori'));
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(null, 204);
    }
}