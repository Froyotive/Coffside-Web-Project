<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

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

        $gambar_promo = $request->file('gambar_promo');
        $nama_file = $gambar_promo->getClientOriginalName();
        $gambar_path = $gambar_promo->storeAs('images/promo', $nama_file, 'public');

        Promo::create([
            'nama_promo' => $request->input('nama_promo'),
            'gambar_promo' => $gambar_path,
            'deskripsi_promo' => $request->input('deskripsi_promo'),
            'nilai_potongan' => $request->input('nilai_potongan'),
        ]);

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
            $gambar_promo = $request->file('gambar_promo');
            $nama_file = time() . '_' . $gambar_promo->getClientOriginalName();
            $gambar_path = $gambar_promo->storeAs('images/promo', $nama_file, 'public');
            $promo->update(['gambar_promo' => $gambar_path]);
        }

        $promo->update([
            'nama_promo' => $request->input('nama_promo'),
            'deskripsi_promo' => $request->input('deskripsi_promo'),
            'nilai_potongan' => $request->input('nilai_potongan'),
        ]);

        return redirect()->route('promos.index')->with('success', 'Promo berhasil diperbarui');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();

        return redirect()->route('promos.index')->with('success', 'Promo berhasil dihapus');
    }

    public function landingPage()
    {
        $promos = Promo::all();

        return view('landing_page.promo', compact('promos'));
    }

}