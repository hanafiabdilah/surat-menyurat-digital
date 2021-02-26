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
                                    <select id="sifat_surat" name="sifat_surat" class="form-control @error('sifat_surat') is-invalid @enderror">
                                        <option value="{{ $sifatSurat->sifat_surat}}">{{ $sifatSurat->sifat_surat}}</option>
                                        <option value="Surat Dinas">Surat Dinas</option>
                                        <option value="Surat Rahasia">Surat Niaga</option>                                        
                                        <option value="Surat Pribadi">Surat Sosial</option>                                        
                                        <option value="Surat Biasa">Surat Pengantar</option>                                        
                                    </select>
                                    @error('sifat_surat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="au-card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-upload"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>                   
        </div>
    </div>
@endsection