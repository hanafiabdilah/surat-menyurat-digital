@extends('layouts.app')

@section('title', 'Detail Transaksi Surat')

@section('body')
    <div class="row">
        <div class="col-lg-12">                                    
            <a href="{{ route('transaksisurat.index') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Detail Transaksi Surat</h3>
                    </div>
                    <div class="au-card-body mt-3 mb-3">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No. Agenda</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="no_agenda" class="form-control" value="{{ $transaksiSurat->no_agenda }}" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No. Surat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="no_surat" class="form-control" value="{{ $transaksiSurat->no_surat }}" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pengirim</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="pengirim" class="form-control" value="{{ $transaksiSurat->pengirim }}" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Isi Ringkas</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="isi_ringkas" rows="7" class="form-control" disabled>{{ $transaksiSurat->isi_ringkas }}</textarea>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tanggal_surat" class="form-control" value="{{ $transaksiSurat->tanggal_surat->format('Y-m-d') }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Diterima</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tanggal_diterima" class="form-control" value="{{ $transaksiSurat->tanggal_diterima->format('Y-m-d') }}" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea type="text" rows="5" name="keterangan" class="form-control" disabled>{{ $transaksiSurat->keterangan }}</textarea>
                            </div>
                        </div>
                                                                                                            
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Kategori</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="kategori" id="kategori" class="form-control" disabled>
                                    <option value="">Pilih Kategori</option>
                                    <option value="in" @if($transaksiSurat->kategori == 'in') selected @endif>Surat Masuk</option>
                                    <option value="out" @if($transaksiSurat->kategori == 'out') selected @endif>Surat Keluar</option>                                                        
                                </select>
                            </div>
                        </div>                                                                                                                                                                                                                           
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file" class=" form-control-label">File</label>
                            </div>
                            <div class="col-12 col-md-9">
                                @if($transaksiSurat->file)
                                    <label>{{ $transaksiSurat->file }}</label> |
                                    <a href="{{ asset('storage/surat') }}/{{ $transaksiSurat->file}}" target="_blank">View</a> |
                                    <a href="{{ route('downloadFile', $transaksiSurat->file) }}" target="_blank">Download</a>
                                @else 
                                    <label>Tidak Ada File</label>
                                @endif
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Dibuat Oleh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $transaksiSurat->createdBy->username ?? 'User sudah dihapus' }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Dibuat Pada</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $transaksiSurat->created_at->format('d-M-Y H:i') }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Terakhir diupdate oleh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $transaksiSurat->updatedBy->username ?? 'User telah dihapus' }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" disabled>Terakhir diupdate pada</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{ $transaksiSurat->updated_at->format('d-M-Y H:i') }}" disabled>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->role == 'staff')
                    <div class="au-card-footer">
                        <a href="{{ route('transaksisurat.edit', $transaksiSurat->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o"></i> Edit
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection