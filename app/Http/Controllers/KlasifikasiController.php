<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Klasifikasi;
use App\User;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasis = Klasifikasi::all();
        return view('klasifikasi.index', compact('klasifikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.create');
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
            'nama' => 'required|min:8|max:50|regex:/^[a-zA-Z .]+$/',
            'jabatan' => 'required|min:4|max:50|regex:/^[a-zA-Z ]+$/',
        ]);
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;
        Klasifikasi::create($request->all());
        return redirect(route('klasifikasi.index'))->with('success', 'Klasifikasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $klasifikasi = Klasifikasi::find($id);
        return view('klasifikasi.edit', compact('klasifikasi'));
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
            'nama' => 'required|min:8|max:50|regex:/^[a-zA-Z .]+$/',
            'jabatan' => 'required|min:4|max:50|regex:/^[a-zA-Z ]+$/',
        ]);
        $klasifikasi = Klasifikasi::find($id);
        $request['updated_by'] = Auth::user()->id;
        $klasifikasi->update($request->all());
        return back()->with('success', 'Klasifikasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klasifikasi = Klasifikasi::find($id);
        $klasifikasi->delete();
        return back()->with('success', 'Klasifikasi berhasil dihapus');
    }
}
