@extends('layouts.app')

@section('title', 'Edit Sifat Surat')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('sifatsurat.index') }}" class="btn btn-secondary mb-3 text-white">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Edit Sifat Surat
                    </div>
                    <form action="{{ route('sifatsurat.update',$sifatSurat->id) }}" method="post">
                    @csrf
                    @method('put')
                        <div class="au-card-body mt-3 mb-3">                                                                                                                
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="sifat_surat" class=" form-control-label">Sifat Surat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="sifat_surat" name="sifat_surat" value="{{ $sifatSurat->sifat_surat }}" class="form-control @error('sifat_surat') is-invalid @enderror">
                                    @error('sifat_surat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label>Dibuat oleh</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" value="{{ $sifatSurat->createdBy->username ?? 'User sudah dihapus' }}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label>Dibuat pada</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" value="{{ $sifatSurat->created_at->format('d-M-Y H:i') }}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label>Terakhir diupdate oleh</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" value="{{ $sifatSurat->updatedBy->username ?? 'User sudah dihapus' }}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label>Terakhir diupdate pada</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" value="{{ $sifatSurat->updated_at->format('d-M-Y H:i') }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="au-card-footer">
                            @if(Auth::user()->role == 'admin')
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-upload"></i> Update
                            </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>                   
        </div>
    </div>
@endsection