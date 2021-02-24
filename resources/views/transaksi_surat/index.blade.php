@extends('layouts.app')

@section('title', 'Transaksi Surat')

@section('body')
<div class="container-fluid">
    <div class="row">                            
        <div class="col-lg-12">
        <a href="{{ route('transaksisurat.create') }}" class="btn btn-success mb-4">Tambah</a>                            
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>No. Agenda</th>
                            <th>No. Surat</th>
                            <th>Pengirim</th>
                            <th>Tanggal Surat</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>       
    </div>
</div>
@endsection