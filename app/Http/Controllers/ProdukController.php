<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        $kategori = KategoriProduk::all();
        return view('produk.index', compact('produk', 'kategori'));
    }

    public function insert(Request $request)
    {
        $harga = Str::of($request->harga)->replace('Rp', '');
        $harga_produk = Str::of($harga)->replace('.', '');
        $date = date('Ymd His gis');

        // dd($request->all());

        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'gambar' => 'required','mimes:png,jpg,jpeg,JPG',
        ]);

        try {

            $produk = new Produk;
            $produk->kategori_id = $request->kategori_id;
            $produk->nama = $request->nama;
            $produk->harga = $harga_produk;
            $produk->deskripsi = $request->deskripsi;
            $produk->status = $request->status;
            if($request->hasFile('gambar')){
                $request->file('gambar')->move('dashboard/xhtml/images/card/', $date.$request->file('gambar')->getClientOriginalName());
                $produk->gambar = $date.$request->file('gambar')->getClientOriginalName();
                $produk->save();
            }

            return redirect()->back()->with('success', 'Produk telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update_detail(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

        $harga = Str::of($request->harga)->replace('Rp', '');
        $harga_produk = Str::of($harga)->replace('.', '');

        try {
            Produk::where('id', $id)->update([
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
                'harga' => $harga_produk,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status
            ]);

            return redirect()->back()->with('success', 'Detail Produk telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Detail Produk gagal diupdate');
        }
    }

    public function update_gambar(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required','mimes:png,jpg,jpeg,JPG',
        ]);

        $date = date('Ymd His gis');

        try {
            $produk = Produk::find($id);

            if($request->hasFile('gambar')){
                $request->file('gambar')->move('dashboard/xhtml/images/card/', $date.$request->file('gambar')->getClientOriginalName());
                $produk->gambar = $date.$request->file('gambar')->getClientOriginalName();
                $produk->save();
            }

            return redirect()->back()->with('success', 'Gambar Produk telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Gambar Produk gagal diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            Produk::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Produk telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Produk gagal dihapus');
        }
    }
}
