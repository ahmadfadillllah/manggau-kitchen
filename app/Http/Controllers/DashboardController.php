<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $total_order = Pesanan::all()->count();
        $pesanan_masuk = Pesanan::where('status', 'Pesanan Masuk')->count();
        $pesanan_diolah = Pesanan::where('status', 'Pesanan Sedang Diolah')->count();
        $pesanan_selesai = Pesanan::where('status', 'Pesanan Selesai')->count();
        return view('dashboard.index', compact('total_order', 'pesanan_masuk', 'pesanan_diolah', 'pesanan_selesai'));
    }
}
