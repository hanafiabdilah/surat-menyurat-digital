<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $transaksiSurats = TransaksiSurat::orderBy('created_at', 'DESC')->get();
        $countTransaksi = TransaksiSurat::count();
        return view('transaksi_surat.index', compact('transaksiSurats', 'countTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi_surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Tidak boleh kosong',
            'max' => 'Tidak boleh melebihi :max karakter',
        ];
        $this->validate($request, [
            'no_agenda' => 'required|max:50',
            'no_surat' => 'required',
            'pengirim' => 'required',
            'isi_ringkas' => 'required|max:255',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'kategori' => 'required',
            'keterangan' => 'max:255',
            'file' => 'max:2048',
        ], $messages);

        $cekNoAgenda = TransaksiSurat::where('no_agenda', $request->no_agenda)->count();
        $cekNoSurat = TransaksiSurat::where('no_surat', $request->no_surat)->count();
        if ($cekNoAgenda < 1) {
            if ($cekNoSurat < 1) {
                $request['created_by'] = Auth::user()->id;
                TransaksiSurat::create($request->all());
                return redirect(route('transaksisurat.index'))->with('success', 'Surat berhasil ditambahkan');
            }
            return back()->with('error', 'No surat sudah ada')->withInput();
        }
        return back()->with('error', 'No agenda sudah ada')->withInput();
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
