<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        $users = User::where('role', 'staff')->orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('users'));
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
        $this->validate($request, [
            'nama' => 'required|min:6|max:50|regex:/^[a-zA-Z .]+$/',
            'email' => 'required|email|min:8|max:50|',
            'username' => 'required|min:5|max:16|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:8|max:20',
            'role' => 'required',
        ]);
        $cekUsername = User::where('username', $request->username)->count();
        if ($cekUsername < 1) {
            $request['created_by'] = Auth::user()->id;
            $request['updated_by'] = Auth::user()->id;
            $request['password'] = Hash::make($request->password);
            User::create($request->all());
            return redirect(route('user.index'))->with('success', 'User berhasil ditambahkan');
        }
        return back()->with('error', 'Username sudah digunakan')->withInput();
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
        if ($user->role != 'admin') {
            return view('user.show', compact('user'));
        }
        return abort(404);
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
        $this->validate($request, [
            'nama' => 'required|min:6|max:50|regex:/^[a-zA-Z .]+$/',
            'email' => 'required|email|min:8|max:50|',
            'role' => 'required',
        ]);
        $user = User::find($id);
        $request['updated_by'] = Auth::user()->id;
        $request['password'] = Hash::make($request->password);
        $user->update($request->all());
        return back()->with('success', 'User berhasil diupdate');
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
        return back()->with('success', 'User berhasil dihapus');
    }

    public function filter(Request $request)
    {
        $role_filter = $request->role_filter;
        if($role_filter){
            $users = User::where('role','LIKE' , '%' . $role_filter . '%')->get();
            return view('user.index',compact('users','role_filter'));
        }        
    }
}
