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
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->file('file')) {
            $file = $request->file('file');
            $namaFile = time() . '.' . $file->extension();
            $oldFile = storage_path(__('app/public/userfoto/:namafile', ['namafile' => $user->foto]));
            $file->move(storage_path('app/public/userfoto'), $namaFile);
            File::delete($oldFile);
            $request['foto'] = $namaFile;
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
