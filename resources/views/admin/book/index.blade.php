@extends('backend.master')
@section('content')

<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3>Daftar Buku</h3>

                        
                    </div>
                    
                </div>
            <hr class="sidebar-divider">
            <div>
                <a href="{{route("book-create")}}"><button class="btn btn-primary">+ Buku</button></a>
            </div>
        </div>
    </div>
    
    {{-- <table class="table table-striped mt-3 fw-bold">
        <thead>
            <tr>
            <th scope="col">No</th> 
            <th scope="col">Nama Buku</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tahun terbit</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $key => $item)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->author}}</td>
                <td>{{$item->year}}</td>
                <td>{{$item->status}}</td>
            
            <td>
                <a class="btn btn-primary" href="{{route("perpus-edit", $item->id)}}">
                    Edit
                </a>
                <form action="{{route("perpus-delete", $item->id)}}"
                    method="post" style="display: inline"
                    class="form-check-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                    type="submit">Hapus</button>
                </form>
            </td>
            </tr>
            @endforeach     
        </tbody>
    </table> --}}

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Status</th>
                    <th>Status</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $key => $item)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->author}}</td>
                <td>{{$item->year}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->file_book}}</td>
                <td>{{$item->cover_book}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route("book-edit", $item->id)}}">
                        Edit
                    </a>
                    <form action="{{route("book-destroy", $item->id)}}"
                        method="post" style="display: inline"
                        class="form-check-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                        type="submit">Hapus</button>
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

