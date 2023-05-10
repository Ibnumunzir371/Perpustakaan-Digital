@extends('backend.master')
@section('content')

<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3>Daftar Pengguna</h3>

                        {{-- <ul class="breadcrumb">
                            <li class="breadcrumb-item">Koleksi Ebook</li>
                        </ul> --}}
                        
                    </div>
                    
                </div>
            <hr class="sidebar-divider">
            <div>
                <a href=""><button class="btn btn-primary">+ User</button></a>
            </div>
        </div>
    </div>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($member as $key => $item)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->nis}}</td>
                <td>{{$item->class}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route("category-edit", $item->id)}}">
                        Edit
                    </a>
                    <form action="{{route("member-destroy", $item->id)}}"
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