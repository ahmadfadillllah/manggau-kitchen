<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class ProdukOrderController extends Controller
{
    //
    public function index()
    {
        $pesanan = Pesanan::with('produk', 'user')->where('status', '!=', 'Pesanan Berakhir')->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function pesanan_dalam_antrian($id)
    {
        try {
            Pesanan::where('id', $id)->update(['status' => 'Pesanan Dalam Antrian']);

            return redirect()->back()->with('success', 'Berhasil mengupdate status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal mengupdate status');
        }
    }

    public function pesanan_sedang_diolah($id)
    {
        try {
            Pesanan::where('id', $id)->update(['status' => 'Pesanan Sedang Diolah']);

            return redirect()->back()->with('success', 'Berhasil mengupdate status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal mengupdate status');
        }
    }

    public function pesanan_diantar($id)
    {
        try {
            Pesanan::where('id', $id)->update(['status' => 'Pesanan Diantar']);

            return redirect()->back()->with('success', 'Berhasil mengupdate status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal mengupdate status');
        }
    }

    public function pesanan_selesai($id)
    {
        try {
            Pesanan::where('id', $id)->update(['status' => 'Pesanan Selesai']);

            return redirect()->back()->with('success', 'Berhasil mengupdate status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal mengupdate status');
        }
    }

    public function pesanan_berakhir($id)
    {
        dd($id);
        try {
            Pesanan::where('id', $id)->update(['status' => 'Pesanan Berakhir']);

            return redirect()->back()->with('success', 'Berhasil mengupdate status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal mengupdate status');
        }
    }
}
