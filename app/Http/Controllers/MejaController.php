<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class MejaController extends Controller
{
    public function index()
    {
        $meja = User::where('role','=', 'meja')->get();
        return view('meja.index', compact('meja'));
    }

    public function insert(Request $request)
    {
        $date = date('YmdHisgis');

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'role' => 'meja',
                'password' => Hash::make('MejaPassword@@'),
                'avatar' => 'user2.svg',
                'qrcode' => $date.'qrcode.svg'
            ]);

            QrCode::generate($request->email.$request->password, public_path('/dashboard/xhtml/images/qrcode/').$date.'qrcode.svg');

            return redirect()->back()->with('success', 'Meja telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Meja gagal ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'no_hp' => ['required'],
        ],
        [
            'name.required' => 'Tidak boleh kosong',
            'email.required' => 'Tidak boleh kosong',
            'no_hp.required' => 'Tidak boleh kosong',
        ]);

        try {
            User::whereId($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
            ]);

            return back()->with("success", "Detail Meja telah diubah");
        } catch (\Throwable $th) {
            return back()->with("info", "Detail Meja gagal diubah");
        }
    }
}
