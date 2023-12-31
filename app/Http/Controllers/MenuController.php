<?php

namespace App\Http\Controllers;

// app/Http/Controllers/MenuController.php

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::simplePaginate(5);
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'kategori_menu' => 'required',
            'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_menu' => 'required|numeric',
        ]);

        $menu = new Menu();
        $menu->nama_menu = $request->input('nama_menu');
        $menu->kategori_menu = $request->input('kategori_menu');

        // Upload gambar_menu
        $gambar_menu = $request->file('gambar_menu');
        $gambar_menu_path = $gambar_menu->storeAs('images/menu', $gambar_menu->getClientOriginalName(), 'public');
        $menu->gambar_menu = $gambar_menu_path;

        $menu->harga_menu = $request->input('harga_menu');
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'kategori_menu' => 'required',
            'harga_menu' => 'required|numeric',
        ]);

        $menu = Menu::find($id);
        $menu->nama_menu = $request->input('nama_menu');
        $menu->kategori_menu = $request->input('kategori_menu');

        if ($request->hasFile('gambar_menu')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete($menu->gambar_menu);

            // Upload gambar_menu yang baru
            $gambar_menu = $request->file('gambar_menu');
            $gambar_menu_path = $gambar_menu->storeAs('images/menu', $gambar_menu->getClientOriginalName(), 'public');
            $menu->gambar_menu = $gambar_menu_path;
        }

        $menu->harga_menu = $request->input('harga_menu');
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete($menu->gambar_menu);

        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus');
    }
}