<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;
use App\User;

class AccountController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('account.index', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:50|regex:/^[a-zA-Z .]+$/',
            'email' => 'required|max:50|email',
            'upload' => 'file|max:2048',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->file('upload')) {
            $foto = $request->file('upload');
            $namaFoto = time() . '.' . $foto->extension();
            $oldFoto = storage_path(__('app/public/userfoto/:namafoto', ['namafoto' => $user->foto]));
            $foto->move(storage_path('app/public/userfoto'), $namaFoto);
            File::delete($oldFoto);
            $request['foto'] = $namaFoto;
        }
        $user->update($request->all());
        return back()->with('success', 'Data berhasil diupdate');
    }

    public function password()
    {
        return view('account.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required',
            'password' => 'required|min:8|max:16',
            'konfirmasi' => 'required|min:8|max:16',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->password_lama, $user->password)) {
            if ($request->password === $request->konfirmasi) {
                $request['password'] = Hash::make($request->password);
                $user->update($request->all());
                return back()->with('success', 'Password berhasil diubah');
            }
            return back()->with('error', 'Password baru dan konfirmasi password tidak sesuai');
        }
        return back()->with('error', 'Password lama salah');
    }
}
