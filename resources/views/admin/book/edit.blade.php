{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Nama Kategori</label>
                <input name="category" type="text" placeholder="Masukkan nama kategori book" class="form-control" id="category" >
                @error('category')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html> --}}

@extends('backend.master')
@section('content')
<div class="card card-body">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <h1>Tambahkan Data</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Buku</label>
            <input name="name" value="{{$book->name}}" type="text" placeholder="Masukkan nama buku" class="form-control" id="name" >
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Pilih Kategori</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($category as $item)
                    <option @if ($book->category_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input name="author" value="{{$book->author}}" type="text" placeholder="Masukkan nama penulis" class="form-control" id="author" >
            @error('author')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun Terbit</label>
            <input name="year" value="{{$book->year}}" type="text" placeholder="Masukkan nama tahun terbit" class="form-control" id="year" >
            @error('year')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input name="status" value="{{$book->status}}" type="text" placeholder="Masukkan nama status" class="form-control" id="status" >
            @error('status')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="file_book" class="form-label">File Buku</label>
            <div class="input-groub">
                <input name="file_book" value="{{$book->file_book}}" type="file" class="form-control" id="file_book" >
            </div>
            @error('file_book')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover_book" class="form-label">Cover Buku</label>
            <div class="input-groub">
                <input name="cover_book" value="{{$book->cover_book}}" type="file" class="form-control" id="cover_book" >
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