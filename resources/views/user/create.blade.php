@extends('layouts.app')

@section('title', 'Tambah User')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('user.index') }}" class="btn btn-secondary mb-3 text-white">
                <i class="fa fa-chevron-left"></i> Kembali
            </a>
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Tambah User
                    </div>
                    <form action="{{ route('user.store') }}" method="post">
                    @csrf
                        <div class="au-card-body mt-3 mb-3">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nama" class=" form-control-label">Nama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="nama" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label">Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="password" type="password"  name="password" class="form-control @error('password') is-invalid @enderror">                                
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="role" class=" form-control-label">Role</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="">Pilih Role</option>
                                        <option value="staff" @if(old('role') == 'staff') selected @endif)>Staff</option>                                    
                                    </select>
                                    @error('role')
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