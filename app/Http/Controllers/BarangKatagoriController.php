<?php

namespace App\Http\Controllers;

use App\Models\BarangKatagori;
use Illuminate\Http\Request;

class BarangKatagoriController extends Controller
{
    public function index()
    {
        $katagori = BarangKatagori::paginate(3);
        return view('katagori',compact('katagori'));
        //return BarangKatagori::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $katagori = BarangKatagori::create($validated);
        return response()->json($katagori, 201);
    }

    public function show($id)
    {
        $katagori = BarangKatagori::findOrFail($id);
        return response()->json($katagori);
    }

    public function update(Request $request, $id)
    {
        $katagori = BarangKatagori::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|string',
        ]);
        $katagori->update($validated);
        return response()->json($katagori);
    }

    public function destroy($id)
    {
        $katagori = BarangKatagori::findOrFail($id);
        $katagori->delete();
        return response()->json(null, 204);
    }
}