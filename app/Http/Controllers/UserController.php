<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::where([
             ['role','=','Staff']
         ])->get();
         $countUser = User::count();

         return view('user.index',compact('users','countUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekUsername = User::where('username', $request->username)->count();
        if ($cekUsername < 1) {
            $request->request->add(['created_by' => 'admin']);
            $request['password'] = Hash::make($request->password);
            User::create($request->all());
            return back()->with('message', 'User berhasil ditambahkan');
        }
        return back()->with('message', 'Username sudah digunakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $cekUsername = User::where('username', $request->username)->count();
        if ($cekUsername < 1) {
            $request['password'] = Hash::make($request->password);
            $user->update($request->all());
            return back()->with('message', 'User berhasil diupdate');
        }
        return back()->with('message', 'Username sudah digunakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('message', 'User berhasil dihapus');
    }
}
