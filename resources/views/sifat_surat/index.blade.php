@extends('layouts.app')

@section('title', 'Sifat Surat')

@section('body')
    <div class="row">                            
        <div class="col-lg-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Sifat Surat</h3>
                    </div>

                    <div class="au-card-body mt-3 mb-3">                        
                        <div class="table-data__tool">
                                    <div class="table-data__tool-left">                                            
                                        <a href="{{ route('sifatsurat.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small mb-3">
                                            <i class="zmdi zmdi-plus"></i> Tambah
                                        </a>
                                        </div>
                                    <div class="table-data__tool-right">
                                            <form action="{{ route('filter_surat') }}" method="get">
                                                    <div class="rs-select2--light rs-select2--md">
                                                    <select class="js-select2" name="sifat_surat_filter">                                                
                                                        <option value="" @isset($sifat_surat_filter) @if($sifat_surat_filter == '') selected @endif @endisset>Semua User</option>
                                                        <option value="surat penting" @isset($sifat_surat_filter) @if($sifat_surat_filter == 'surat penting') selected @endif @endisset>surat penting</option>
                                                        <option value="surat biasa" @isset($sifat_surat_filter) @if($sifat_surat_filter == 'surat biasa') selected @endif @endisset>surat biasa</option>                                                        
                                                        <option value="surat dinas" @isset($sifat_surat_filter) @if($sifat_surat_filter == 'surat dinas') selected @endif @endisset>surat dinas</option>                                                        
                                                        <option value="surat sosial" @isset($sifat_surat_filter) @if($sifat_surat_filter == 'surat sosial') selected @endif @endisset>surat sosial</option>                                                        
                                                        <option value="surat niaga" @isset($sifat_surat_filter) @if($sifat_surat_filter == 'surat niaga') selected @endif @endisset>surat niaga</option>                                                        
                                                        <option value="surat pengantar" @isset($sifat_surat_filter) @if($sifat_surat_filter == 'surat pengantar') selected @endif @endisset>surat pengantar</option>                                                        
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                    </div>                                        
                                                    <button class="au-btn-filter">
                                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                                            </form>
                                    </div>
                                </div>

                    <div class="au-card-body mt-3 mb-3">
                        @if(Auth::user()->role == 'admin')
                        <a href="{{ route('sifatsurat.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small mb-3">
                            <i class="zmdi zmdi-plus"></i> Tambah
                        </a>
                        @endif

                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped text-center">
                                <thead class="bg-info">
                                    <tr>                                        

                                        <th class="text-light">No</th>                                                                                
                                        <th class="text-light">Sifat Surat</th>  
                                        @if(Auth::user()->role == 'admin')                                                                              
                                        <th class="text-light">Action</th>
                                        @endif                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($sifatSurats->count() > 0)
                                        @foreach($sifatSurats as $s)
                                            <tr>                                                
                                            <td>{{ $loop->iteration }}</td>
                                                <td style="vertical-align: middle">{{ $s->sifat_surat }}</td>        
                                                @if(Auth::user()->role == 'admin')                                                                                                                                        
                                                <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-info rounded-circle item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('sifatsurat.edit', $s->id) }}">Edit</a>
                                                        <form action="{{ route('sifatsurat.destroy', $s->id ) }}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>                                                        
                                                    </div>
                                                </div>
                                                </td>
                                                
                                                @endif
                                            </tr>                          
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Data tidak ditemukan</td>                                           
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
@endsection