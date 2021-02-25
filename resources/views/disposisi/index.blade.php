@extends('layouts.app')

@section('title', 'Disposisi')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-data__tool-left mb-3">                                        
                <a href="{{ route('transaksisurat.index') }}" class="btn btn-secondary">
                <i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="au-card">
                <div class="au-card-header">
                    <h3 class="title-2">Disposisi</h3>
                </div>
                <div class="au-card-body mt-3 mb-3">
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">                                        
                            <a href="{{ route('disposisi.create', $id_surat) }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-light">No.</th>
                                    <th class="text-light">Tujuan</th>
                                    <th class="text-light">Sifat Surat</th>
                                    <th class="text-light">Batas Waktu</th>
                                    <th class="text-light">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($disposisis->count() > 0)
                                    @foreach($disposisis as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->tujuan }}</td>
                                            <td>{{ $d->sifat_surat }}</td>
                                            <td>{{ $d->batas_waktu->format('d-m-y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-info rounded-circle item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('disposisi.edit', [$id_surat, $d->id]) }}">Edit</a>
                                                        <form action="{{ route('disposisi.destroy', [$id_surat, $d->id]) }}" method="post">
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
                                        <td colspan="5">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection