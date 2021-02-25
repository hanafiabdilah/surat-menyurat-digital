@extends('layouts.app')

@section('title', 'Klasifikasi')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('klasifikasi.create') }}" class="btn btn-success mb-4">Tambah</a>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped text-center">
                    <thead class="bg-info">
                        <tr>
                            <th class="text-light">No</th>
                            <th class="text-light">Nama</th>
                            <th class="text-light">Jabatan</th>
                            <th class="text-light">Created By</th>
                            <th class="text-light">Action</th>
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
                                    <td>
                                        <a class="btn btn-warning" href=""><i class="fa fa-pencil-square-o"></i></a>
                                        <form style="display: inline" action="" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection