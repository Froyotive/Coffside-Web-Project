<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('promos.index', compact('promos'));
    }

    public function create()
    {
        $promo = new Promo();
        return view('promos.create', compact('promo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_promo' => 'required|string',
            'gambar_promo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_promo' => 'required|string',
            'nilai_potongan' => 'required|numeric',
        ]);

        $promo = new Promo();
        $promo->nama_promo = $request->input('nama_promo');
        $promo->deskripsi_promo = $request->input('deskripsi_promo');
        $promo->nilai_potongan = $request->input('nilai_potongan');

        // Upload gambar_promo dengan nama asli file
        $gambar_promo = $request->file('gambar_promo');
        $nama_file = $gambar_promo->getClientOriginalName();
        $gambar_promo_path = $gambar_promo->storeAs('images/promo', $nama_file, 'public');
        $promo->gambar_promo = $gambar_promo_path;

        $promo->save();

        return redirect()->route('promos.index')->with('success', 'Promo berhasil ditambahkan');
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('promos.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $promo = Promo::findOrFail($id);

        $request->validate([
            'nama_promo' => 'required|string',
            'deskripsi_promo' => 'required|string',
            'nilai_potongan' => 'required|numeric',
        ]);

        if ($request->hasFile('gambar_promo')) {
            Storage::disk('public')->delete($promo->gambar_promo);

            $gambar_promo = $request->file('gambar_promo');
            $nama_file = $gambar_promo->getClientOriginalName();
            $gambar_promo_path = $gambar_promo->storeAs('images/promo', $nama_file, 'public');
            $promo->gambar_promo = $gambar_promo_path;
        }

        $promo->nama_promo = $request->input('nama_promo');
        $promo->deskripsi_promo = $request->input('deskripsi_promo');
        $promo->nilai_potongan = $request->input('nilai_potongan');

        $promo->save();

        return redirect()->route('promos.index')->with('success', 'Promo berhasil diperbarui');
    }


    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);

        // Hapus gambar_promo dari storage
        Storage::disk('public')->delete($promo->gambar_promo);

        $promo->delete();

        return redirect()->route('promos.index')->with('success', 'Promo berhasil dihapus');
    }
}