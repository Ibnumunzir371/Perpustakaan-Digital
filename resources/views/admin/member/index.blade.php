@extends('backend.master')
@section('content')

<div class="card body-card">
    <div class="card-body">
        <div class="pagetitle">
        <h1>Daftar Pengguna</h1>
        <hr class="text-dark">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Pengguna</li>
            </ol>
        </nav>
        </div>
    </div>
</div>
<div class="card card-body">
    <div class="page-header">
        <div class="page-block">
            <div class="d-flex justify-content-between align-items-center mt-4">
                {{-- <h3 class="mb-0">Daftar Pengguna</h3> --}}
                <a href="{{route("member-create")}}"><button class="btn btn-primary">+ Pengguna</button></a>
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
                    <a class="btn btn-primary" href="{{route("member-edit", $item->id)}}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{route("member-destroy", $item->id)}}"
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
