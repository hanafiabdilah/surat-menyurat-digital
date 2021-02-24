<<<<<<< HEAD
@extends('layouts.app')

@section('title', 'Transaksi Surat | Tambah ')

@section('body')
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah Data</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="users" method="post" enctype="multipart/form-data" class="form-horizontal">                                            
                                        @csrf
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">No. Agenda</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="no_agenda" class="form-control @error('no_agenda') is-invalid @enderror">
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
                                                    <input type="number" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror">
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
                                                    <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror">
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
                                                    <textarea name="isi_ringkas " rows="9" class="form-control @error('pengirim') is-invalid @enderror"></textarea>
                                                </div>
                                                @error('isi_ringkas')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror">
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
                                                    <input type="date" name="tanggal_diterima" class="form-control @error('tanggal_diterima') is-invalid @enderror">
                                                    @error('tanggal_diterima')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Keterangan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
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
                                                        <option value="">Please select</option>
                                                        <option value="Surat Masuk">Surat Masuk</option>
                                                        <option value="Surat Keluar">Surat Keluar</option>                                                        
                                                    </select>
                                                    @error('kategori')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>                                                                                                                                                                                                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file" class=" form-control-label">File</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file" name="file" class="form-control-file">
                                                </div>
                                            </div>                                           
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>                               
                            </div>
                     </div>
    </div>
@endsection
=======
@extends('layouts.app')
>>>>>>> 8a642119028e670fa34692a250b68bc305e7337d
