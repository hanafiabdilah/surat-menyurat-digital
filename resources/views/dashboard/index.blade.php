@extends('layouts.app')

@section('title', 'Dashboard')

@section('body')
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="statistic__item statistic__item--blue">
                <h2 class="number text-light">{{ $transaksiSurat->where('kategori','=','in')->count() }}</h2>
                <span class="desc text-light">Surat Masuk</span>
                <div class="icon">
                    <i class="zmdi zmdi-email"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="statistic__item statistic__item--green">
                <h2 class="number text-light">{{ $transaksiSurat->where('kategori','=','out')->count() }}</h2>
                <span class="desc text-light">Surat Keluar</span>
                <div class="icon">
                    <i class="fa fa-location-arrow"></i>
                </div>
            </div>
        </div>  
        {{-- <div class="col-md-6 col-lg-4">
            <div class="statistic__item statistic__item--orange">
                <h2 class="number text-light">{{ $klasifikasi->count() }}</h2>
                <span class="desc text-light">Klasifikasi</span>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>                       --}}
    </div>
@endsection