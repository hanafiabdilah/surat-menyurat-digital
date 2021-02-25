<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiSurat;
use App\Klasifikasi;
use App\SifatSurat;
use App\Disposisi;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_surat)
    {
        $disposisis = Disposisi::where('id_transaksi_surat', $id_surat)->orderBy('created_at', 'DESC')->get();
        return view('disposisi.index', compact('disposisis', 'id_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_surat)
    {
        $klasifikasis = Klasifikasi::all();
        $sifatSurats = SifatSurat::all();
        return view('disposisi.create', compact('klasifikasis', 'sifatSurats', 'id_surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_surat)
    {
        $messages = [
            'required' => 'Tidak boleh kosong',
            'max' => 'Tidak boleh melebihi :max karakter',
        ];
        $this->validate($request, [
            'tujuan' => 'required',
            'sifat_surat' => 'required',
            'isi_ringkas' => 'required|max:255',
            'batas_waktu' => 'required',
            'catatan' => 'max:255',
        ], $messages);
        $request['id_transaksi_surat'] = $id_surat;
        Disposisi::create($request->all());
        return redirect(route('disposisi.index', $id_surat))->with('success', 'Disposisi berhasil ditambahkan');
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
    public function edit($id_surat, $id)
    {
        $disposisi = Disposisi::find($id);
        $klasifikasis = Klasifikasi::all();
        $sifatSurats = SifatSurat::all();
        return view('disposisi.edit', compact('klasifikasis', 'sifatSurats', 'id_surat', 'disposisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_surat, $id)
    {
        $messages = [
            'required' => 'Tidak boleh kosong',
            'max' => 'Tidak boleh melebihi :max karakter',
        ];
        $this->validate($request, [
            'tujuan' => 'required',
            'sifat_surat' => 'required',
            'isi_ringkas' => 'required|max:255',
            'batas_waktu' => 'required',
            'catatan' => 'max:255',
        ], $messages);
        $disposisi = Disposisi::find($id);
        $disposisi->update($request->all());
        return back()->with('success', 'Disposisi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_surat, $id)
    {
        $disposisi = Disposisi::find($id);
        $disposisi->delete();
        return back()->with('success', 'Disposisi berhasil dihapus');
    }
}
