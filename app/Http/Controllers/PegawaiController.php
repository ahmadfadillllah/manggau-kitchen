<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        $pegawai = User::where('role','=', 'dapur')->orWhere('role','=', 'kasir')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function insert(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'password' => Hash::make('password'),
                'avatar' => 'user2.svg'
            ]);

            return redirect()->back()->with('success', 'Pegawai telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Pegawai gagal ditambahkan');
        }
    }

    public function change_password(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'min:8'],
        ],
        [
            'password.min' => 'Password lama minimal 8 karakter',
        ]);

        try {
            User::whereId($id)->update([
                'password' => Hash::make($request->password_baru)
            ]);

            return back()->with("success", "Password telah diubah");
        } catch (\Throwable $th) {
            return back()->with("info", "Password gagal diubah");
        }
    }

    public function change_role(Request $request, $id)
    {
        $request->validate([
            'role' => ['required'],
        ],
        [
            'role.required' => 'Silahkan pilih role',
        ]);

        try {
            User::whereId($id)->update([
                'role' => $request->role
            ]);

            return back()->with("success", "Role telah diubah");
        } catch (\Throwable $th) {
            return back()->with("info", "Role gagal diubah");
        }
    }
}
