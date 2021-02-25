@extends('layouts.app')

@section('title', 'Tambah Klasifikasi')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('klasifikasi.index') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Tambah Klasifikasi</h3>
                    </div>
                    <form action="{{ route('klasifikasi.store') }}" method="post">
                    @csrf
                        <div class="au-card-body mt-3 mb-3">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="nama" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value={{ old('nama') }}>
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="jabatan">Jabatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="jabatan" type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value={{ old('jabatan') }}>
                                    @error('jabatan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="au-card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="zmdi zmdi-plus"></i> Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection