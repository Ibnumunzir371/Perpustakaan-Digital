{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('backend.master')

@section('content')
<div class="container">
    <h1>Welcome, {{Auth::user()->name}}</h1>

    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Total Members</div>
                        <div class="card-count">{{$membercount}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-book"></i></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Total Books</div>
                        <div class="card-count">{{$bookcount}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-person-lines-fill"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Daftar Peminjaman</div>
                        <div class="card-count">100</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-file-text"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Daftar Pengembalian</div>
                        <div class="card-count">100</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-body mt-5">
    <div class="page-header">
        <div class="page-block">
                <div class="row align-items-center ">
                    <div class="col-md-8">
                        <h3>Buku Pinjamanku</h3>
                    </div>
                    
                </div>
            <hr class="sidebar-divider">
        </div>
        <div class="mt-4">
            <div class="row">
                <div class="col py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi Masuk</h6>
                </div>
                
                <div class="col text-right">
                    <button type="button" class="btn btn-primary plus" data-bs-toggle="modal" data-bs-target="#pemasukanModal">
                        <span data-feather="plus"></span>
                        Tambah Pemasukan
                    </button>
                </div>
            </div>
            <div>
                <h5 class="card-tittle">judul</h5>
                <p class="card-text">Tanggal kembali : </p>
            </div>
            
        </div>
    </div>
</div>
@endsection
