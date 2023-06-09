
{{-- @extends('backend.master')
@section('content')
<div class="card card-body">
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0"> 
            <a href="{{route("category-create")}}"><button class="btn btn-primary">+ tambahkan buku</button></a>
        </div>
        <div class="col-sm-6">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                    <input value="{{Request::get('category')}}" name="category" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas icon-search fa-sm"></i>
                        </button>
                    </div>
            </div>
        </form>
    </div>
    <table class="table table-striped mt-3 fw-bold">
        <thead>
            <tr>
            <th scope="col">No</th> 
            <th scope="col">Nama Kategori</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $item)
            <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->category}}</td>
            
            <td>
                <a class="btn btn-primary" href="{{route("category-edit", $item->id)}}">
                    Edit
                </a>
                <form action="{{route("category-delete", $item->id)}}"
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

</div>
@endsection --}}

@extends('backend.master')
@section('content')

<div class="card body-card">
    <div class="card-body">
        <div class="pagetitle">
        <h1>Daftar Kategori</h1>
        <hr class="text-dark">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Kategori</li>
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
                <a href="{{route("category-create")}}"><button class="btn btn-primary">+ Kategori</button></a>
            </div>
        </div>
    </div>
    
    {{-- <table class="table table-striped mt-3 fw-bold">
        <thead>
            <tr>
            <th scope="col">No</th> 
            <th scope="col">Nama Kategori</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $item)
            <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->category}}</td>
            
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
                    <th>Nama Kategori</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $key => $item)
                <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route("category-edit", $item->id)}}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{route("category-delete", $item->id)}}"
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



