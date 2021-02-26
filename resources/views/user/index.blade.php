@extends('layouts.app')

@section('title', 'User')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <div class="au-card-header">
                        <h3 class="title-2">User</h3>
                    </div>
                    <div class="au-card-body mt-3 mb-3">                         
                        <div class="table-data__tool">
                                    <div class="table-data__tool-left">                                            
                                        <a href="{{ route('user.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small mb-3">
                                        <i class="zmdi zmdi-plus"></i> Tambah
                                    </a>                                        
                                        </div>
                                    <div class="table-data__tool-right">
                                            <form action="{{ route('filter_user') }}" method="get">
                                                    <div class="rs-select2--light rs-select2--md">
                                                    <select class="js-select2" name="role">                                                
                                                        <option value="" @isset($role) @if($role == '') selected @endif @endisset>Semua User</option>
                                                        <option value="admin" @isset($role) @if($role == 'admin') selected @endif @endisset>Admin</option>
                                                        <option value="staff" @isset($role) @if($role == 'staff') selected @endif @endisset>Staff</option>                                                        
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                    </div>                                        
                                                    <button class="au-btn-filter">
                                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                                            </form>
                                    </div>
                                </div>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped text-center">
                                <thead class="bg-info">
                                    <tr>                      
                                        <th class="text-light">No.</th>                             
                                        <th class="text-light">Nama</th>
                                        <th class="text-light">Role</th>
                                        <th class="text-light">Email</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users->count() >0)
                                        @foreach($users as $u)
                                        <tr>        
                                            <td>{{ $loop->iteration }}</td>                                            
                                            <td>{{ $u->nama }}</td>
                                            <td><span class="role user">{{ $u->role }}</span></td>
                                            <td>{{ $u->email }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-info rounded-circle item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('user.show', $u->id) }}">Detail</a>
                                                        <a class="dropdown-item" href="{{ route('user.edit', $u->id) }}">Edit</a>
                                                        <form action="{{ route('user.destroy', $u->id ) }}" method="post">
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
                                            <td colspan="6">Data tidak ditemukan</td>                                           
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