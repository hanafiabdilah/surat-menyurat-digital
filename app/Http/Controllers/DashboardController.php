<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klasifikasi;
use App\TransaksiSurat;

class DashboardController extends Controller
{
    public function index()
    {
        $klasifikasi = Klasifikasi::all();
        $transaksiSurat = TransaksiSurat::all();
        return view('dashboard.index',compact('klasifikasi','transaksiSurat'));        
    }
}
