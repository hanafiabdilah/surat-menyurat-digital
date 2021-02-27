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
                                @if(Auth::user()->role == 'admin')
                                <a href="{{ route('sifatsurat.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small mb-3">
                                    <i class="zmdi zmdi-plus"></i> Tambah
                                </a>
                                @endif
                            </div>
                        </div>
                    <div class="au-card-body mt-3 mb-3">                        
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