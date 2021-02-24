<?php

namespace App\Http\Controllers;

use App\SifatSurat;
use Illuminate\Http\Request;

class SifatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sifatSurat = SifatSurat::all();
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
        $request->request->add(['created_by' => 'admin', ['updated_by'] => '']);
        SifatSurat::create($request->all());
        return back()->with('message', 'Sifat Surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sifatSurat = SifatSurat::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sifatSurat = SifatSurat::find($id);
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
        $sifatSurat = SifatSurat::find($id);
        $request->request->add(['updated_by' => 'admin']);
        $sifatSurat->update($request->all());
        return back()->with('message', 'Sifat Surat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sifatSurat = SifatSurat::find($id);
        $sifatSurat->delete();
        return back()->with('message', 'Sifat Surat berhasil dihapus');
    }
}
