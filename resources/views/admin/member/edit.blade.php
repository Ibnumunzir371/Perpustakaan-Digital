{{-- @extends('backend.master')
@section('content')
<div class="card card-body">
    <form action="{{route("edit-update", $user->id)}}" method="post">
        @csrf
        @method("put")
        <h1>Edit Data Member</h1>
        <div class="mb-3">
            <label for="nis" class="form-label">Nis</label>
            <input name="nis" type="text" value="nis" class="form-control" id="nis" >
            @error('nis')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Kelas</label>
            <input name="class" type="text" value="class" class="form-control" id="nis" >
            @error('nis')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">Nis</label>
            <input name="nis" type="text" value="nis" class="form-control" id="nis" >
            @error('nis')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">Nis</label>
            <input name="nis" type="text" value="nis" class="form-control" id="nis" >
            @error('nis')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection --}}