<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SifatSurat;

class SifatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sifatSurats = SifatSurat::all();
        return view('sifat_surat.index', compact('sifatSurats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sifat_surat.create');
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
            'sifat_surat' => 'required|regex:/^[a-zA-Z ]+$/',
        ]);
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;

        SifatSurat::create($request->all());
        return redirect(route('sifatsurat.index'))->with('success', 'Sifat Surat berhasil ditambahkan');
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
        $sifatSurat = SifatSurat::find($id);

        return view('sifat_surat.edit', compact('sifatSurat'));
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
            'sifat_surat' => 'required|regex:/^[a-zA-Z ]+$/',
        ]);
        $sifatSurat = SifatSurat::find($id);
        $request['updated_by'] = Auth::user()->id;
        $sifatSurat->update($request->all());
        return back()->with('success', 'Sifat Surat berhasil diupdate');
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
        return back()->with('success', 'Sifat Surat berhasil dihapus');
    }
}
