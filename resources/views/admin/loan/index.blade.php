

@extends('backend.master')
@section('content')

<div class="card body-card">
    <div class="card-body">
        <div class="pagetitle">
        <h1>Daftar Peminjaman</h1>
        <hr class="text-dark">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Peminjaman</li>
            </ol>
        </nav>
        </div>
    </div>
</div>
<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
            <div class="d-flex justify-content-between align-items-center mt-4">
                {{-- <h3 class="mb-0">Daftar Peminjaman</h3> --}}
                <a href="{{route("loan-create")}}"><button class="btn btn-primary">+ Peminjaman</button></a>
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
                <th>Opsi</th>
            </thead>
            <tbody>
                @foreach ($loans as $key => $item)
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
                    @if ($item->regs_back == 'masih dipinjam')
                            <span class="badge badge-warning mb-2">{{ $item->regs_back }}</span>
                            <div class="container">
                                <div class="row">
                                    <div class="sm-col-6 md-col-4">
                                        <form class="mb-1" action="{{ route('loan-update', $item->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="regs_back" value="dikembalikan">
                                            <button type="submit" class="btn btn-danger"><i class="icon-copy dw dw-cancel"></i></button>
                                        </form>
                                    </div>
                                    <div class="sm-col-6 md-col-8">
                                        <form action="{{ route('loan-update', $item->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="regs_back" value="masih dipinjam">
                                            <button type="submit" class="btn btn-success"><i class="icon-copy dw dw-checked"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>               
                        @elseif ($item->regs_back == 'dikembalikan')
                            <span class="badge badge-info mb-2">{{ $item->regs_back }}</span>
                            <form action="{{ route('loan-update', $item->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="regs_back" value="masih dipinjam">
                                <button type="submit" class="btn btn-danger"><i class="icon-copy dw dw-cancel"></i></button>
                            </form>
                        @else
                            <span class="badge badge-danger mb-2">{{ $item->regs_back }}</span>
                            <form action="{{ route('loan-update', $item->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="regs_back" value="dikembalikan">
                                <button type="submit" class="btn btn-success"><i class="icon-copy dw dw-checked"></i></button>
                            </form>
                        @endif
                </td> --}}
                <td>
                    <form action="{{ route('loan-update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                    </form>
                    {{-- <a class="btn btn-primary mb-1" href="{{route("loan-update", $item->id)}}">
                        <i class="bi bi-pencil-square"></i>
                    </a> --}}
                    {{-- <form action="{{route("book-destroy", $item->id)}}"
                        method="post" style="display: inline"
                        class="form-check-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                        type="submit" ><i class="bi bi-trash3"></i></button>
                    </form> --}}
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

