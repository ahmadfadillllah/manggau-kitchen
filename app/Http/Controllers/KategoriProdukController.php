<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    //
    public function index()
    {
        $kategori = KategoriProduk::all();

        return view('kategoriproduk.index', compact('kategori'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            KategoriProduk::create([
                'nama' => $request->nama,
            ]);

            return redirect()->back()->with('success', 'Kategori Produk telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Kategori Produk gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            KategoriProduk::where('id', $id)->update(['nama' => $request->nama]);

            return redirect()->back()->with('success', 'Kategori Produk telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Kategori Produk gagal diupdate');
        }


    }

    public function destroy($id)
    {
        try {
            KategoriProduk::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Kategori Produk telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Kategori Produk gagal dihapus');
        }
    }
}
