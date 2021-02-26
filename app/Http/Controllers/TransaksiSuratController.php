<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TransaksiSurat;
use App\Disposisi;
use File;

class TransaksiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiSurats = TransaksiSurat::orderBy('no_agenda', 'DESC')->get();
        return view('transaksi_surat.index', compact('transaksiSurats'));
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
        $this->validate($request, [
            'no_agenda' => 'required|max:50',
            'no_surat' => 'required|max:50',
            'pengirim' => 'required|max:70|regex:/^[a-zA-Z .]+$/',
            'isi_ringkas' => 'required|max:255',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'kategori' => 'required',
            'keterangan' => 'max:255',
            'upload' => 'max:2048',
        ]);

        $cekNoAgenda = TransaksiSurat::where('no_agenda', $request->no_agenda)->count();
        $cekNoSurat = TransaksiSurat::where('no_surat', $request->no_surat)->count();
        if ($cekNoAgenda < 1) {
            if ($cekNoSurat < 1) {
                if ($request->file('upload')) {
                    $file = $request->file('upload');
                    $namaFile = time() . '.' . $file->extension();
                    $file->move(storage_path('app/public/surat'), $namaFile);
                    $request['file'] = $namaFile;
                }
                $request['created_by'] = Auth::user()->id;
                $request['updated_by'] = Auth::user()->id;
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
        return view('transaksi_surat.show', compact('transaksiSurat'));
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
        return view('transaksi_surat.edit', compact('transaksiSurat'));
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
            'no_agenda' => 'required|max:50',
            'no_surat' => 'required|max:50',
            'pengirim' => 'required|max:70|regex:/^[a-zA-Z .]+$/',
            'isi_ringkas' => 'required|max:255',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'keterangan' => 'max:255',
            'upload' => 'max:2048',
        ]);

        $transaksiSurat = TransaksiSurat::find($id);
        $cekNoAgenda = TransaksiSurat::where('no_agenda', $request->no_agenda)->where('no_agenda', '!=', $transaksiSurat->no_agenda)->count();
        $cekNoSurat = TransaksiSurat::where('no_surat', $request->no_surat)->where('no_surat', '!=', $transaksiSurat->no_surat)->count();
        if ($cekNoAgenda < 1) {
            if ($cekNoSurat < 1) {
                if ($request->file('upload')) {
                    $file = $request->file('upload');
                    $namaFile = time() . '.' . $file->extension();
                    $oldFile = storage_path(__('app/public/surat/:namafile', ['namafile' => $transaksiSurat->file]));
                    $file->move(storage_path('app/public/surat'), $namaFile);
                    File::delete($oldFile);
                    $request['file'] = $namaFile;
                }
                $request['updated_by'] = Auth::user()->id;
                $transaksiSurat->update($request->all());
                return redirect(route('transaksisurat.edit', $transaksiSurat->id))->with('success', 'Surat berhasil ditambahkan');
            }
            return back()->with('error', 'No surat sudah ada');
        }
        return back()->with('error', 'No agenda sudah ada');
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
        return back()->with('success', 'Surat berhasil dihapus');
    }

    public function downloadFile($file)
    {
        return response()->download(storage_path("app/public/surat/{$file}"));
    }

    public function viewFile($file)
    {
        return view('transaksi_surat.view_file', compact('file'));
    }

    public function filter(Request $request)
    {
        $berdasarkan = $request->berdasarkan;
        $kategori = $request->kategori;
        $dari_tanggal = $request->dari_tanggal;
        $sampai_tanggal = $request->sampai_tanggal;
        if ($dari_tanggal) {
            if ($sampai_tanggal) {
                if ($berdasarkan) {
                    $transaksiSurats = TransaksiSurat::where('kategori', 'LIKE', '%' . $kategori . '%')->whereDate($berdasarkan, '>=', $dari_tanggal)->whereDate($berdasarkan, '<=', $sampai_tanggal)->orderBy($berdasarkan, 'DESC')->get();
                }
                $this->validate($request, [
                    'berdasarkan' => 'required',
                ]);
            }
            $this->validate($request, [
                'sampai_tanggal' => 'required',
                'berdasarkan' => 'required',
            ]);
        } elseif ($sampai_tanggal) {
            $this->validate($request, [
                'dari_tanggal' => 'required',
                'berdasarkan' => 'required',
            ]);
            $transaksiSurats = TransaksiSurat::where('kategori', 'LIKE', '%' . $kategori . '%')->orderBy($berdasarkan, 'DESC')->get();
        } else {
            $transaksiSurats = TransaksiSurat::where('kategori', 'LIKE', '%' . $kategori . '%')->get();
        }


        return view('transaksi_surat.index', compact('transaksiSurats', 'berdasarkan', 'kategori', 'dari_tanggal', 'sampai_tanggal'));
    }
}
