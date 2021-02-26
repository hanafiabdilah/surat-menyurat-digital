@extends('layouts.app')

@section('title', 'Detail Sifat Surat')

@section('body')
    <div class="row">
        <div class="col-lg-12">                                    
            <a href="{{ route('sifatsurat.index') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Detail Sifat Surat</h3>
                    </div>
                    <div class="au-card-body mt-3 mb-3">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Sifat Surat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="sifat_surat" id="sifat_surat" class="form-control" disabled>                                    
                                    <option value="{{ $sifatsurat->sifat_surat}}">{{ $sifatsurat->sifat_surat}}</option>                                    
                                </select>
                            </div>
                        </div>                        

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Dibuat Oleh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $sifatsurat->createdBy->username ?? 'User sudah dihapus' }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Dibuat Pada</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $sifatsurat->created_at->format('d-M-Y H:i') }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Terakhir diupdate oleh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $sifatsurat->updatedBy->username ?? 'User telah dihapus' }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Terakhir diupdate pada</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $sifatsurat->updated_at->format('d-M-Y H:i') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="au-card-footer">
                        <a href="{{ route('sifatsurat.edit', $sifatsurat->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection