@extends('layouts.app')

@section('title', 'Tambah Sifat Surat')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('sifatsurat.index') }}" class="btn btn-secondary mb-3 text-white">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Tambah Sifat Surat
                    </div>
                    <form action="{{ route('sifatsurat.store') }}" method="post">
                    @csrf
                        <div class="au-card-body mt-3 mb-3">                                                                                                                
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="sifat_surat" class=" form-control-label">Sifat Surat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="sifat_surat" name="sifat_surat" class="form-control @error('sifat_surat') is-invalid @enderror">
                                    @error('sifat_surat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="au-card-footer">
                            <button class="btn btn-sm btn-primary">
                                <i class="zmdi zmdi-plus"></i> Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>                   
        </div>
    </div>
@endsection