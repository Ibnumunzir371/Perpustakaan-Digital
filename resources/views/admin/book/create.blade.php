@extends('backend.master')
@section('content')
<div class="card card-body">
    <form action="{{route("book-store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Tambahkan Data</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Buku</label>
            <input name="name" type="text" placeholder="Masukkan nama buku" class="form-control" id="name" value="{{ old('name')}}">
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id" class="form-label">Pilih Kategori</label>
            <select class="form-control" name="category_id" id="category_id" >
                <option label="pilih category"></option>
                @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input name="author" type="text" placeholder="Masukkan nama penulis" class="form-control" id="author" value="{{ old('author')}}">
            @error('author')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun Terbit</label>
            <input name="year" type="text" placeholder="Masukkan nama tahun terbit" class="form-control" id="year" value="{{ old('year')}}">
            @error('year')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input name="status" type="text" placeholder="Masukkan nama status" class="form-control" id="status" value="{{ old('status')}}">
            @error('status')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="file_book" class="form-label">File Buku</label>
            <div class="input-groub">
                <input name="file_book" type="file" class="form-control" accept="pdf/*" >
            </div>
            @error('file_book')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Cover Buku</label>
            <div class="input-groub">
                <input name="image" type="file" accept ="image/*" class="form-control" > 
            </div>
            @error('cover_book')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection