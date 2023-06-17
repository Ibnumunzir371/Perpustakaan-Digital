

@extends('backend.master')
@section('content')

<div class="card body-card">
    <div class="card-body">
        <div class="pagetitle">
        <h1>Daftar Pengembalian</h1>
        <hr class="text-dark">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Pengembalian</li>
            </ol>
        </nav>
        </div>
    </div>
</div>
<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
            <div class="d-flex justify-content-between align-items-center mt-4">
                {{-- <a href=""><button class="btn btn-primary">+ Peminjaman</button></a> --}}
            </div>
        </div>
    </div>

        <table id="myTable" class="display">
            <thead>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Dikembalikan</th>
                <th>Status</th>
                <th>Denda</th>
            </thead>
            <tbody>
                @foreach ($loan as $key => $item)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$item->User->nis}}</td>
                    <td>{{$item->User->name}}</td>
                    <td>{{$item->Book->name}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>
                        @if (date_format($item->updated_at, 'Y-m-d') != ($item->start_date) )
                            {{ date_format($item->updated_at, 'Y-m-d')}}
                        @endif
                    </td>
                    <td>
                        <div>
                            @if ($item->status == 'dikembalikan')
                                <span class="badge badge-success mb-2">{{ $item->status }}</span>
                            @else
                                <span class="badge badge-danger mb-2">{{ $item->status }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        @if ($item->forfeit != 0)
                            {{$item->forfeit}} 
                        @else
                            Tidak Ada
                        @endif
                    </td>
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
@endsection

