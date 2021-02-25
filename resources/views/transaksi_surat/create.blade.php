
@extends('layouts.app')

@section('title', 'Transaksi Surat | Tambah ')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-data__tool-left mb-3">                                        
                <a href="{{ route('transaksisurat.index') }}" class="btn btn-secondary">
                <i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Tambah Surat</h3>
                    </div>
                    <form action="{{ route('transaksisurat.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">  
                    @csrf
                        <div class="au-card-body mt-3 mb-3">                                             
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">No. Agenda</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="no_agenda" class="form-control @error('no_agenda') is-invalid @enderror" value="{{ old('no_agenda') }}">
                                    @error('no_agenda')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">No. Surat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" value="{{ old('no_surat') }}">
                                    @error('no_surat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pengirim</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" value="{{ old('pengirim') }}">
                                    @error('pengirim')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Isi Ringkas</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="isi_ringkas" rows="7" class="form-control @error('isi_ringkas') is-invalid @enderror">{{ old('isi_ringkas') }}</textarea>
                                    @error('isi_ringkas')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ Request::old('tanggal_surat') }}">
                                    @error('tanggal_surat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tanggal Diterima</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" name="tanggal_diterima" class="form-control @error('tanggal_diterima') is-invalid @enderror" value="{{ Request::old('tanggal_surat') }}">
                                    @error('tanggal_diterima')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Keterangan</label>
                                    <small>- <i>Optional</i></small>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea type="text" rows="5" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                    
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
                                    <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                        <option value="">Pilih Kategori</option>
                                        <option value="in" @if(old('kategori') == 'in') selected @endif>Surat Masuk</option>
                                        <option value="out" @if(old('kategori') == 'out') selected @endif>Surat Keluar</option>                                                        
                                    </select>
                                    @error('kategori')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>                                                                                                                                                                                                                           
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file" class=" form-control-label">File</label>
                                    <small>- <i>Optional</i></small>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file" name="file" class="form-control-file" accept=".docx, .doc, .pdf">
                                    <small class="form-text text-secondary">Max 2MB | .docx, .doc, .pdf</small>
                                    @error('file')
                                    <small class="form-text text-danger">Ukuran file tidak boleh melebihi 2MB</small>
                                    @enderror
                                </div>
                            </div>                                           
                        </div>
                        <div class="au-card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="zmdi zmdi-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </form>
            </div>                               
        </div>
    </div>
@endsection
