@extends('layouts.app')

@section('title', 'User')

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- USER DATA-->
            <div class="user-data m-b-30">
                <h3 class="title-3 m-b-30">
                    <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                <div class="filters m-b-45">
                <a href="{{ route('user.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>    Tambah</a>
                </div>
                <div class="table-responsive table-data">
                    <table class="table">
                        <thead>
                            <tr>                                                   
                                <td>name</td>
                                <td>role</td>
                                <td>email</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if($countUser >0)
                                @foreach($users as $u)
                                <tr>                                                    
                                    <td>
                                        <div class="table-data__info">
                                            <h6>{{ $u->nama }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="role user">{{ $u->role }}</span>
                                    </td>
                                    <td>
                                    <span href="#">{{ $u->email }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.show', $u->id) }}" class="btn btn-info rounded-circle item"><i class="zmdi zmdi-more"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td align="center" colspan="6">Data Kosong</td>                                           
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>                                    
            </div>
            <!-- END USER DATA-->
        </div>                            
    </div>
</div>
@endsection