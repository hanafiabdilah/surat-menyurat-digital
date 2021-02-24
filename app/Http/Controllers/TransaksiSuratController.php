<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiSurat;

class TransaksiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiSurats = TransaksiSurat::all();
        return view('dashboard.mail',compact('transaksiSurats'));
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
        TransaksiSurat::create($request->all());
        return back()->with('message', 'Surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksiSurat = TransaksiSurat::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksiSurat = TransaksiSurat::find($id);
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
        $transaksiSurat = TransaksiSurat::find($id);
        $request->request->add(['updated_by' => 'admin']);
        $transaksiSurat->update($request->all());
        return back()->with('message', 'Surat berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksiSurat = TransaksiSurat::find($id);
        $transaksiSurat->delete();
        return back()->with('message', 'Surat berhasil dihapus');
    }
}
