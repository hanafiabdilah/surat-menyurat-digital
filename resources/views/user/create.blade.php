@extends('layouts.app')

@section('title', 'User | Tambah')

@section('body')
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
                <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm mb-3 text-white">
                        <i class="fa fa-chevron-left"></i> Kembali
                    </a>
            <div class="card">
                <div class="card-header">
                    <strong>Tambah User</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('user.create') }}" method="post" class="form-horizontal">
                        @csrf
                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="nama" placeholder="Enter Name..." class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email"  name="email" placeholder="Enter Email..." class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-password" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password"  name="password" placeholder="Enter Password..." class="form-control @error('password') is-invalid @enderror">                                
                                @error('foto')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="role" class=" form-control-label">Role</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">Please select</option>
                                    <option value="Staff">Staff</option>                                    
                                </select>
                                @error('role')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="foto" class=" form-control-label">Foto</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="foto" name="foto" class="form-control-file @error('foto') is-invalid @enderror">
                                @error('foto')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>                    
                </div>
            </div>                        
        </div>
        </div>
    </div>
@endsection