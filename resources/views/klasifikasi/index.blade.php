@extends('layouts.app')

@section('title', 'Klasifikasi')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('klasifikasi.create') }}" class="btn btn-success mb-4">Tambah</a>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($klasifikasis as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{ $k->jabatan }}</td>
                                    <td>{{ $k->created_by }}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection