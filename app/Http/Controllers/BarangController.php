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

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = BarangKatagori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'katagori_id' => 'required|exists:barang_katagori,id',
            'nama'        => 'required|string|max:255|unique:barang,nama,' . $barang->id,
            'gambar'      => 'required|url',
            'deskripsi'   => 'nullable|string',
            'stock'       => 'required|integer|min:0',
            'thumbnail'   => 'nullable|file|image|max:2048', // thumbnail optional saat update
        ]);

        // Proses upload file thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $path = $file->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $updated = $barang->update($validated);

        if ($updated) {
            return redirect()->route('barang.index')
                ->with('success', 'Data barang berhasil diupdate.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Data barang gagal diupdate.');
        }
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $deleted = $barang->delete();

        if ($deleted) {
            return redirect()->route('barang.index')
                ->with('success', 'Data barang berhasil dihapus.');
        } else {
            return back()
                ->with('error', 'Data barang gagal dihapus.');
        }
    }
}