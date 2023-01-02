<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('produk', 'user')->where('status', '=', 'Pesanan Berakhir')->get();
        return view('transaksi.index', compact('pesanan'));
    }
}
