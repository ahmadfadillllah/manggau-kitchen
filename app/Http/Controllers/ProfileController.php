<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->role != 'meja'){
            return view('profile.index');
        }else{
            return redirect()->route('order.index')->with('info','Maaf, anda tidak memiliki hak akses');
        }
    }

    public function update(Request $request)
    {
        try {
            User::where('id', Auth::user()->id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'no_hp' => $request->no_hp,
            ]);

            return redirect()->back()->with('success', 'Profile telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Profile gagal diupdate');
        }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', 'min:8'],
            'password_baru' => ['required', 'min:8'],
        ],
        [
            'password_lama.min' => 'Password lama minimal 8 karakter',
            'password_baru.min' => 'Password baru minimal 8 karakter',
        ]);

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return back()->with("info", "Password lama salah");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return back()->with("success", "Password telah diubah");
    }

    public function change_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required','mimes:png,jpg,jpeg,JPG',
        ]);

        $date = date('Ymd His gis');

        try {
            $produk = User::find(Auth::user()->id);

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('dashboard/xhtml/images/profile/', $date.$request->file('avatar')->getClientOriginalName());
                $produk->avatar = $date.$request->file('avatar')->getClientOriginalName();
                $produk->save();
            }

            return redirect()->back()->with('success', 'Avatar telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Avatar gagal diupdate');
        }
    }
}
