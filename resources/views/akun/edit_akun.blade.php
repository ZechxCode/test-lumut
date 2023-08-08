@extends('template')

@section('konten')
    <h5>Form Edit Akun</h5>
    <form action="{{ url('akun/' . $editData->id) }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="username"
                value="{{ $editData->username }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="name"
                value="{{ $editData->name }}">
        </div>
        {{-- <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="title"
                value="{{ $editData->password }}">
        </div> --}}
        <div class="mb-3">
            <label for="role">Role</label>
            <select class="form-control" name="role" id="">
                <option value="{{ $editData->role }}">{{ $editData->role }}</option>
                <option value="admin">admin</option>
                <option value="author">author</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/akun" class="btn btn-warning">Cancel</a>
    </form>
@endsection
