<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKatagori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(5);
        return view('barangAdmin',compact('barang'));
        //return Barang::with('katagori')->get();
    }

    public function create()
{
    // Ambil data kategori untuk dropdown (jika diperlukan di form)
    $kategoris = BarangKatagori::all();

    return view('barang.create', [
        'kategoris' => $kategoris
    ]);
}

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'katagori_id' => 'required|exists:barang_katagori,id',
        'nama'        => 'required|string|max:255|unique:barang,nama',
        'gambar'      => 'required|url',
        'deskripsi'   => 'nullable|string',
        'stock'       => 'required|integer|min:0',
        'thumbnail'   => 'required|file|image|max:2048', // max 2MB
    ]);

    // Proses upload file thumbnail
    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $path = $file->store('thumbnails', 'public');
        $validated['thumbnail'] = $path;
    }

    $barang = Barang::create($validated);

    if ($barang) {
        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil disimpan.');
    } else {
        return back()
            ->withInput()
            ->with('error', 'Data barang gagal disimpan.');
    }
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