<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klasifikasi;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = Klasifikasi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['created_by' => 'admin', 'updated_by' => '']);
        Klasifikasi::create($request->all());
        return back()->with('message', 'Klasifikasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $klasifikasi = Klasifikasi::find($id);
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
        $klasifikasi = Klasifikasi::find($id);
        $request->request->add(['updated_by' => 'admin']);
        $klasifikasi->update($request->all());
        return back()->with('message', 'Klasifikasi berhasil diupdate');
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
        return back()->with('message', 'Klasifikasi berhasil dihapus');
    }
}
