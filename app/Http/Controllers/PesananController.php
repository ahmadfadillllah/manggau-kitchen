<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    //
    public function index(Request $request)
    {
        // dd($request->all());
        if($request->has('search')){
            $produk = Produk::where('nama', 'like','%'.$request->search.'%')->get();
        }else{
            $produk = Produk::all();
        }
        $pesanan = Pesanan::with('produk')->where('user_id', Auth::user()->id)->where('status', '=', 'Pesanan Masuk')->get();

        $cart = Pesanan::with('produk')->where('user_id', Auth::user()->id)->where('status', '=', 'Pesanan Masuk')->count();
        return view('order.index', compact('produk', 'cart', 'pesanan'));
    }

    public function add($id)
    {
        $prod = Pesanan::where('produk_id',$id)->where('status','Pesanan Masuk')->where('user_id',Auth::user()->id)->get()->count();
        try {
            if($prod >= 1){
                return redirect()->back()->with('info', 'Pesanan sudah ada dikeranjang');
            }else if ($prod == 0){
                Pesanan::create([
                    'user_id' => Auth::user()->id,
                    'produk_id' => $id,
                    'jumlah' => 1,
                    'status' => 'Pesanan Masuk',
                ]);
            }
            return redirect()->back()->with('success', 'Pesanan berhasil masuk ke keranjang');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Pesanan gagal masuk ke keranjang');
        }
    }

    public function checkout()
    {
        $pesanan = Pesanan::with('produk')->where('user_id', Auth::user()->id)->where('status', '=', 'Pesanan Masuk')->get();
        // $total = $pesanan->produk->harga * $pesanan->jumlah;
        // dd($pesanan);
        $pesanan2 = Pesanan::with('produk')->where('user_id', Auth::user()->id)->where('status', '!=', 'Pesanan Masuk')->where('status', '!=', 'Pesanan Berakhir')->get();
        if($pesanan->isEmpty() and $pesanan2->isEmpty()){
            return redirect()->route('order.index')->with('info', 'Pesanan Masih Kosong');
        }
        return view('order.checkout', compact('pesanan', 'pesanan2'));
    }

    public function update_jumlah(Request $request)
    {
        try {
            foreach($request->id as $key=>$value){
                $pesanan = Pesanan::find($request->id[$key]);
                $pesanan->jumlah = $request->jumlah[$key];
                $pesanan->catatan = $request->catatan[$key];
                $pesanan->save();
            }
            return redirect()->back()->with('success', 'Berhasil update pesanan');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['info' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {

            Pesanan::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Pesanan telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['info' => $th->getMessage()]);
        }

    }

    public function proses(Request $request)
    {
        try {
            foreach($request->id as $key=>$value){
                $pesanan = Pesanan::find($request->id[$key]);
                $pesanan->status = "Pesanan Dalam Antrian";
                $pesanan->save();
            }

            return redirect()->route('order.checkout')->with('success', 'Pesanan berhasil masuk dalam antrian, mohon menunggu');
        } catch (\Throwable $th) {
            return redirect()->route('order.checkout')->with(['info' => $th->getMessage()]);
        }
    }
}
