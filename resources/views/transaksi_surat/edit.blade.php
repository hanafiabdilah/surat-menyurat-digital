@extends('layouts.app')

@section('title', 'Edit Arsip Surat')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('transaksisurat.index') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Edit Arsip Surat</h3>
                    </div>
                    <form action="{{ route('transaksisurat.update', $transaksiSurat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <div class="au-card-body mt-3 mb-3">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="no_agenda" class=" form-control-label">No. Agenda</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="no_agenda" type="number" name="no_agenda" class="form-control @error('no_agenda') is-invalid @enderror" value="{{ $transaksiSurat->no_agenda }}">
                                    @error('no_agenda')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="no_surat" class=" form-control-label">No. Surat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="no_surat" type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" value="{{ $transaksiSurat->no_surat }}">
                                    @error('no_surat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="pengirim" class=" form-control-label">Pengirim</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="pengirim" type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" value="{{ $transaksiSurat->pengirim }}">
                                    @error('pengirim')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="isi_ringkas" class=" form-control-label">Isi Ringkas</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea id="isi_ringkas" name="isi_ringkas" rows="7" class="form-control @error('isi_ringkas') is-invalid @enderror">{{ $transaksiSurat->isi_ringkas }}</textarea>
                                    @error('isi_ringkas')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tanggal_surat" class=" form-control-label">Tanggal Surat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="tanggal_surat" type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ $transaksiSurat->tanggal_surat->format('Y-m-d') }}">
                                    @error('tanggal_surat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tanggal_diterima" class=" form-control-label">Tanggal Diterima</label>
                                </div>
                                <div id="tanggal_diterima" class="col-12 col-md-9">
                                    <input type="date" name="tanggal_diterima" class="form-control @error('tanggal_diterima') is-invalid @enderror" value="{{ $transaksiSurat->tanggal_diterima->format('Y-m-d') }}">
                                    @error('tanggal_diterima')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="keterangan" class=" form-control-label" disabled>Keterangan</label>
                                    <small>- <i>Optional</i></small>
                                </div>
                                <div id="keterangan" class="col-12 col-md-9">
                                    <textarea type="text" rows="5" name="keterangan" class="form-control">{{ $transaksiSurat->keterangan }}</textarea>
                                    @error('keterangan')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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
                                    <label for="upload" class=" form-control-label">File</label>
                                    <small>- <i>Optional</i></small>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($transaksiSurat->file)
                                        <label>{{ $transaksiSurat->file }}</label> |
                                        <a href="{{ asset('storage/surat') }}/{{ $transaksiSurat->file}}" target="_blank">View</a> |
                                        <a href="{{ route('downloadFile', $transaksiSurat->file) }}" target="_blank">Download</a>
                                    @endif
                                    <input type="file" id="upload" name="upload" class="form-control-file" accept=".docx, .doc, .pdf">
                                    <small class="form-text text-secondary">Max 2MB | .docx, .doc, .pdf</small>
                                    @error('upload')
                                    <small class="form-text text-danger">Ukuran file tidak boleh melebihi 2MB</small>
                                    @enderror
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
                                    <input type="text" class="form-control" value="{{ $transaksiSurat->updatedBy->username ?? 'User sudah dihapus' }}" disabled>
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