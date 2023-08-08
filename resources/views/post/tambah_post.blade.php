@extends('template')

@section('konten')
    <form action="{{ route('tambah.post') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-danger float-end">Submit</button>
        </div>
    </form>
@endsection
