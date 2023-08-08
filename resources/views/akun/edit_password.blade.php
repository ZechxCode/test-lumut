@extends('template')

@section('konten')
    <h5>Form Edit Akun</h5>
    <form action="{{ url('akun/' . $editData->id . '/password') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="mb-3">
            <label class="form-label">Password Lama</label>
            <input type="password" class="form-control" placeholder="Password Lama" name="password_lama">
        </div>
        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password" class="form-control" placeholder="Password Baru" name="password_baru">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/akun" class="btn btn-warning">Cancel</a>
    </form>
@endsection
