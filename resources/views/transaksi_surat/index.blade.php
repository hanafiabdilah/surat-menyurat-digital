@extends('layouts.app')

@section('title', 'Transaksi Surat')

@section('body')
<div class="container-fluid">
    <div class="row">                            
        <div class="col-lg-12">
        <!-- <a href="{{ route('transaksisurat.create') }}" class="btn btn-success mb-4">Tambah</a>                            
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
            </div> -->

                 <!-- DATA TABLE -->
                 <h3 class="title-5 m-b-35">Data Surat</h3>
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
                                                    <td>Data Kosong</td>
                                                    <td>Data Kosong</td>
                                                    <td>Data Kosong</td>
                                                    <td>Data Kosong</td>
                                                    <td>Data Kosong</td>
                                                    <td>Data Kosong</td>                                                    
                                                </tr>
                                        @endif

                                                                                                                                  
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
        </div>       
    </div>
</div>
@endsection