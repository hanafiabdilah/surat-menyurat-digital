@extends('layouts.app')

@section('title', 'Log Download')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">Log Download</h3>
                    </div>
                    <div class="au-card-body mt-3 mb-3">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped text-center">
                                <thead class="bg-info">
                                    <tr>
                                        <th class="text-light">No.</th>
                                        <th class="text-light">File</th>
                                        <th class="text-light">Download Oleh</th>
                                        <th class="text-light">Download Pada</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($logDownloads->count() > 0)
                                        @foreach($logDownloads as $l)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $l->file }}</td>
                                            <td>{{ $l->DownloadBy->username ?? 'User sudah dihapus' }}</td>
                                            <td>{{ $l->created_at->format('d M Y H:i') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-info rounded-circle item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ asset('') }}{{ $l->file }}">Download Ulang</a>
                                                        <form action="{{ route('logDownload.destroy', $l->id ) }}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td colspan="5">Data Tidak Ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection