@extends('backend.master')
@section('content')


<!-- Page-header start -->
{{-- <div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Basic Form Inputs</h5>
        <p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">Basic Componenets</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">Basic Form Inputs</a>
            </li>
        </ul>
    </div>
</div> --}}
<div class="card body-card">
    <div class="card-body">
        <div class="pagetitle">
        <h1>Daftar Buku</h1>
        <hr class="text-dark">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
        </nav>
        </div>
    </div>
</div>
<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
            <div class="d-flex justify-content-between align-items-center mt-4">
                {{-- <h3 class="mb-0">Daftar Buku</h3> --}}
                <a href="{{route("book-create")}}"><button class="btn btn-primary">+ Buku</button></a>
            </div>
        </div>
    </div>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                    <th>Kategori</th>
                    <th>Jenis Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Lokasi</th>
                    <th>stock</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $key => $item)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->type_book}}</td>
                <td>{{$item->author}}</td>
                <td>{{$item->year}}</td>
                <td>{{$item->add}}</td>
                <td>
                    @if ($item->amount_id == '0')
                        <span class="badge badge-danger mb-2">Tidak Tersedia</span>
                    @else
                        <span class="badge badge-primary mb-2">Tersedia {{ $item->amount_id }}</span>
                    @endif
                </td>
                {{-- <td>{{$item->file_book}}</td>
                <td>{{$item->cover_book}}</td> --}}
                
                <td>
                    <a class="btn btn-primary mb-1" href="{{route("book-edit", $item->id)}}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{route("book-destroy", $item->id)}}"
                        method="post" style="display: inline"
                        class="form-check-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                        type="submit" ><i class="bi bi-trash3"></i></button>
                    </form>
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

