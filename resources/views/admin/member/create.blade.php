
@extends('backend.master')
@section('content')
<div class="card card-body">
    <form action="{{route("member-store")}}" method="post">
        @csrf
        <div class="pagetitle">
            <h2 class="mt-3 mb-3">Tambahkan Data</h2>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">Nis</label>
            <input name="nis" type="text" placeholder="Masukkan nis" class="form-control" id="nis" >
            @error('nis')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Kelas</label>
            <input name="class" type="text" placeholder="Masukkan kelas" class="form-control" id="class" >
            @error('class')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input name="name" type="text" placeholder="Masukkan nama" class="form-control" id="name" >
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" name="role" id="role" >
                <option label="pilih jenis pengguna"></option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
            @error('role')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" placeholder="Masukkan email" class="form-control" id="email" >
            @error('email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" placeholder="Masukkan password" class="form-control" id="password" >
            @error('password')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection