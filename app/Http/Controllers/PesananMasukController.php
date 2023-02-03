<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PesananMasukController extends Controller
{
    //
    public function index()
    {
        $meja = User::with('pesanan')->where('role', 'meja')->whereHas('pesanan', function (Builder $query) {
            $query->where('status', '!=', 'Pesanan Berakhir');
        })->get();
        // dd($meja);

        return view('pesananmasuk.index', compact('meja'));
    }

    public function show_data(Request $request)
    {
        $hasillaut = Pesanan::with('user', 'produk')->where('user_id', $request->query('user_id'))->where('status', '!=', 'Pesanan Berakhir')->get();
        return response()->json($hasillaut, 200);
    }

    public function pesanan_berakhir(Request $request)
    {
        try {
            foreach($request->user_id as $key=>$value){
                $pesanan = Pesanan::find($request->user_id[$key]);
                $pesanan->status = 'Pesanan Berakhir';
                $pesanan->save();
            }

            return redirect()->back()->with('success', 'Berhasil mengupdate status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Gagal mengupdate status');
        }
    }
}
