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

    <h1>Welcome, {{Auth::user()->name}}</h1>

    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Total Members</div>
                        <div class="card-count">100</div>
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
@endsection
