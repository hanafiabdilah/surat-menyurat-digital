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
                    <strong>Detail User</strong>
                </div>
                <div class="card-body card-block">

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="foto" class=" form-control-label">foto</label>
                        </div>
                        <div class="col-12 col-md-9">
                            @if($user->file)
                                <img src="{{ asset('storage')}} / {{ $user->file }}" alt="" class="card-img-top">   
                            @else
                                <p class="text-primary">File Tidak Ada</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="nama" value="{{ $user->nama}}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email"  name="email" value="{{ $user->email}}" class="form-control " disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password" class="form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password"  name="password" value="{{ $user->password }}"  class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="role" class=" form-control-label">Role</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="role" class="form-control " disabled>
                                    <option value="{{ $user->role }}" selected>{{ $user->role}}</option>                                                               
                                </select>                               
                            </div>
                        </div>                        
                </div>
                <div class="card-footer">
                    <a type="submit" href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm text-white">
                    <i class="fa fa-pencil-square-o"></i> Edit 
                    </a>                         
                </div>
            </div>                        
        </div>
        </div>
    </div>
@endsection