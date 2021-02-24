@extends('layouts.app')

@section('title', 'Ubah Password')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Ubah Password</h3>
                    </div>
                    <form action="{{ route('password.update') }}" method="post">
                    @csrf
                        <div class="au-card-body mt-3 mb-3">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password_lama">Password Lama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="password_lama" name="password_lama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password">Password Baru</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="konfirmasi">Konfirmasi Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="konfirmasi" name="konfirmasi" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="au-card-footer">
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection