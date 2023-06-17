@extends('backend.master')
@section('content')

    <div class="card card-body">
        <form action="{{route("loan-store")}}" method="post">
            @csrf
            <div class="pagetitle">
                <h2 class="mt-3 mb-3">Tambahkan Data</h2>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama User</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option label="Pilih User"></option>
                    @foreach ($users as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Judul Buku</label>
                <select class="form-control" name="book_id" id="book_id" >
                    <option label="Pilih Judul Buku"></option>
                    @foreach ($books as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('book_id')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah Buku</label>
                <input name="amount" type="number" placeholder="Masukkan jumlah buku" class="form-control" id="amount" min="1">
                @error('amount')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>     
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection