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
    
    @if (Auth::user()->role == "admin")
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
                    <div class="col-6"><i class="bi bi-journal-text"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Total Category</div>
                        <div class="card-count">{{$categorycount}}</div>
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
                        <div class="card-count">{{$loancount}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- halaman user --}}
@if (Auth::user()->role == "user")
{{-- <div class="card card-body mt-5">
    <div class="page-header">
        <div class="page-block">
                <div class="row align-items-center ">
                    <div class="pagetitle">
                        <h2 class="mt-3">Buku Dipinjam</h2>
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
</div> --}}

<div class="card body-card">
    <div class="card-body">
        <div class="pagetitle">
        <h1>Daftar Peminjaman  {{Auth::user()->name}}</h1>
        {{-- <hr class="text-dark">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Peminjaman</li>
            </ol>
        </nav> --}}
        </div>
    </div>
</div>
<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
            <div class="d-flex justify-content-between align-items-center mt-4">
                <h3 class="mb-0">Buku yang Dipinjam</h3>
                {{-- <a href="{{route("loan-create")}}"><button class="btn btn-primary">+ Peminjaman</button></a> --}}
            </div>
        </div>
    </div>

        <table id="myTable" class="display">
            <thead>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Batas Pinjam</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku</th>
                <th>Status</th>
                {{-- <th>Opsi</th> --}}
            </thead>
            <tbody>
                @foreach ($loan as $key => $item)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->User->nis}}</td>
                <td>{{$item->User->name}}</td>
                <td>{{$item->start_date}}</td>
                <td>{{$item->end_date}}</td>
                <td>{{$item->Book->name}}</td>
                <td>{{$item->amount}}</td>
                <td>
                    <div>
                        @if ($item->status == 'dipinjam')
                            <span class="badge badge-primary mb-2">{{ $item->status }}</span>
                        @elseIf ($item->status == 'dikembalikan')
                            <span class="badge badge-success mb-2">{{ $item->status }}</span>
                        @else
                            <span class="badge badge-danger mb-2">{{ $item->status }}</span>
                        @endif
                    </div>
                </td>
                {{-- <td>
                    <form action="{{ route('loan-update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                    </form>
                    <form action="{{route("book-destroy", $item->id)}}"
                        method="post" style="display: inline"
                        class="form-check-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                        type="submit" ><i class="bi bi-trash3"></i></button>
                    </form>
                </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    @section('script')
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
    @endsection
</div>
@endif
@endsection
