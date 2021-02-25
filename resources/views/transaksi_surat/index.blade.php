@extends('layouts.app')

@section('title', 'Transaksi Surat')

@section('body')
<div class="container-fluid">
    <div class="row">                            
        <div class="col-lg-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Transaksi Surat</h3>
                    </div>
                    <div class="au-card-body mt-3 mb-3">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">                                        
                                <a href="{{ route('transaksisurat.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>    Tambah</a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead class="bg-info">
                                    <tr>
                                        <th class="text-light">No. Agenda</th>
                                        <th class="text-light">No. Surat</th>
                                        <th class="text-light">Pengirim</th>
                                        <th class="text-light">Tanggal Surat</th>
                                        <th class="text-light">Kategori</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($countTransaksi > 0)
                                        @foreach($transaksiSurats as $t)
                                            <tr>                                                
                                                <td>{{ $t->no_agenda }}</td>
                                                <td>{{ $t->no_surat }}</td>
                                                <td>{{ $t->pengirim }}</td>
                                                <td>{{ $t->tanggal_surat->format('d-m-Y') }}</td>
                                                <td class="{{ request()->is($t->kategori == 'in') ? 'text-success' : 'text-danger' }}">{{ request()->is($t->kategori == 'in') ? 'Masuk' : 'Keluar' }}</td>
                                                <td>-</td>
                                            </tr>                          
                                        @endforeach
                                        @else
                                            <tr>
                                                <td align="center" colspan="6">Data Kosong</td>                                           
                                            </tr>
                                    @endif                                                                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div>
@endsection