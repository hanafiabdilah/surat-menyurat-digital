@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('body')
    <div class="row">                            
        <div class="col-lg-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Arsip Surat</h3>
                    </div>
                    <div class="au-card-body mt-3 mb-3">
                        <div class="filter mb-3">
                            <form action="{{ route('filter') }}" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="kategori">Kategori</label>
                                        <select id="kategori" name="kategori" class="form-control">
                                            <option value="" disabled selected>Pilih Kategori Surat</option>
                                            <option value="in" @isset($kategori) @if($kategori == 'in') selected @endif @endisset>Surat Masuk</option>
                                            <option value="out" @isset($kategori) @if($kategori == 'out') selected @endif @endisset>Surat Keluar</option>
                                        </select>
                                        @error('kategori')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tanggal">Berdasarkan Tanggal</label>
                                        <select id="tanggal" name="berdasarkan" class="form-control">
                                            <option value="">Pilih Berdasarkan</option>
                                            <option value="tanggal_surat" @isset($berdasarkan) @if($berdasarkan == 'tanggal_surat') selected @endif @endisset>Tanggal Surat</option>
                                            <option value="tanggal_diterima" @isset($berdasarkan) @if($berdasarkan == 'tanggal_diterima') selected @endif @endisset>Tanggal Diterima/Dikirim</option>
                                            <option value="created_at" @isset($berdasarkan) @if($berdasarkan == 'created_at') selected @endif @endisset>Tanggal Dibuat</option>
                                        </select>
                                        @error('berdasarkan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dari_tanggal">Dari Tanggal</label>
                                        <input id="dari_tanggal" type="date" name="dari_tanggal" class="form-control" @isset($dari_tanggal) value="{{ $dari_tanggal }}" @endisset>
                                        @error('dari_tanggal')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sampai_tanggal">Sampai Tanggal</label>
                                        <input id="sampai_tanggal" type="date" name="sampai_tanggal" class="form-control" @isset($dari_tanggal) value="{{ $sampai_tanggal }}" @endisset>
                                        @error('sampai_tanggal')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button class="au-btn au-btn-icon btn-primary au-btn--small mt-2">
                                    <i class="zmdi zmdi-filter-list"></i> Filter
                                </button>
                                @if(request()->is('transaksisurat/f/*'))
                                <a href="{{ route('transaksisurat.index') }}" class="au-btn--danger btn-danger au-btn--small mt-2">
                                    <i class="fa fa-undo"></i> Reset Filter
                                </a>
                                @endif
                            </form>
                        </div>
                        @if(Auth::user()->role == 'staff')
                            <a href="{{ route('transaksisurat.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small mb-3">
                                <i class="zmdi zmdi-plus"></i> Surat Masuk
                            </a>
                            <a href="{{ route('createOut') }}" class="au-btn au-btn-icon au-btn--green au-btn--small mb-3">
                                <i class="zmdi zmdi-plus"></i> Surat Keluar
                            </a>
                        @endif
                        {{-- <a href="{{ route('download') }}" class="au-btn au-btn-icon btn-primary au-btn--small mb-3">
                            <i class="fa fa-download"></i> Download
                        </a> --}}
                        <div class="table-responsive table--no-card m-b-30">
                            @if(request()->is('transaksisurat/f/*'))
                                @if($kategori == 'in')
                                    <table class="table table-borderless table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th class="text-light align-middle text-center">No. Agenda</th>
                                                <th class="text-light align-middle">No. Surat</th>
                                                <th class="text-light align-middle">Pengirim</th>
                                                <th class="text-light align-middle">
                                                    @if(@isset($berdasarkan))
                                                        @if($berdasarkan == 'tanggal_diterima')
                                                            Tanggal Diterima
                                                        @elseif($berdasarkan == 'created_at')
                                                            Tanggal Dibuat
                                                        @else 
                                                            Tanggal Surat
                                                        @endif
                                                    @endif
                                                </th>
                                                <th class="text-light align-middle">Kategori</th>
                                                <th class="text-light align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($transaksiSurats->count() > 0)
                                                @foreach($transaksiSurats as $t)
                                                    <tr>                                                
                                                        <td class="align-middle text-center">{{ $t->id }}</td>
                                                        <td class="align-middle">{{ $t->no_surat }}</td>
                                                        <td class="align-middle">{{ $t->pengirim }}</td>
                                                        <td>
                                                            @if(@isset($berdasarkan))
                                                                @if($berdasarkan == 'tanggal_diterima')
                                                                    {{ $t->tanggal_diterima->format('d/m/Y') }}
                                                                @elseif($berdasarkan == 'created_at')
                                                                    {{ $t->created_at->format('d/m/Y') }}
                                                                @else 
                                                                    {{ $t->tanggal_surat->format('d/m/Y') }}
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="align-middle {{ request()->is($t->kategori == 'in') ? 'text-success' : 'text-danger' }}">{{ request()->is($t->kategori == 'in') ? 'Masuk' : 'Keluar' }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-info rounded-circle item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="zmdi zmdi-more"></i>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    {{-- <a class="dropdown-item" href="{{ route('disposisi.index', $t->id) }}">Disposisi</a> --}}
                                                                    <a class="dropdown-item" href="{{ route('transaksisurat.show', $t->id) }}">Detail</a>
                                                                    @if(Auth::user()->role == 'staff')
                                                                    <a class="dropdown-item" href="{{ route('transaksisurat.edit', $t->id) }}">Edit</a>
                                                                    <form action="{{ route('transaksisurat.destroy', $t->id ) }}" method="post">
                                                                        @csrf
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                        <button type="submit" class="dropdown-item">Hapus</button>
                                                                    </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>                          
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="6">Data tidak ditemukan</td>                                           
                                                </tr>
                                            @endif                                                                              
                                        </tbody>
                                    </table>
                                @else
                                    <table class="table table-borderless table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th class="text-light align-middle text-center">No. Agenda</th>
                                                <th class="text-light align-middle">No. Surat</th>
                                                <th class="text-light align-middle">
                                                    @if(@isset($berdasarkan))
                                                        @if($berdasarkan == 'tanggal_diterima')
                                                            Tanggal Dikirim
                                                        @elseif($berdasarkan == 'created_at')
                                                            Tanggal Dibuat
                                                        @else 
                                                            Tanggal Surat
                                                        @endif
                                                    @endif
                                                </th>
                                                <th class="text-light align-middle">Kategori</th>
                                                <th class="text-light align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($transaksiSurats->count() > 0)
                                                @foreach($transaksiSurats as $t)
                                                    <tr>                                                
                                                        <td class="align-middle text-center">{{ $t->id }}</td>
                                                        <td class="align-middle">{{ $t->no_surat }}</td>
                                                        <td>
                                                            @if(@isset($berdasarkan))
                                                                @if($berdasarkan == 'tanggal_diterima')
                                                                    {{ $t->tanggal_diterima->format('d/m/Y') }}
                                                                @elseif($berdasarkan == 'created_at')
                                                                    {{ $t->created_at->format('d/m/Y') }}
                                                                @else 
                                                                    {{ $t->tanggal_surat->format('d/m/Y') }}
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="align-middle {{ request()->is($t->kategori == 'in') ? 'text-success' : 'text-danger' }}">{{ request()->is($t->kategori == 'in') ? 'Masuk' : 'Keluar' }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-info rounded-circle item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="zmdi zmdi-more"></i>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    {{-- <a class="dropdown-item" href="{{ route('disposisi.index', $t->id) }}">Disposisi</a> --}}
                                                                    <a class="dropdown-item" href="{{ route('transaksisurat.show', $t->id) }}">Detail</a>
                                                                    @if(Auth::user()->role == 'staff')
                                                                    <a class="dropdown-item" href="{{ route('transaksisurat.edit', $t->id) }}">Edit</a>
                                                                    <form action="{{ route('transaksisurat.destroy', $t->id ) }}" method="post">
                                                                        @csrf
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                        <button type="submit" class="dropdown-item">Hapus</button>
                                                                    </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>                          
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="6">Data tidak ditemukan</td>                                           
                                                </tr>
                                            @endif                                                                              
                                        </tbody>
                                    </table>
                                @endif
                            @else 
                                <p class="text-center mt-5 mb-5">Silahkan Pilih Kategori</p>
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
@endsection