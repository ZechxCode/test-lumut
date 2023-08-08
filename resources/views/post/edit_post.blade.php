@extends('template')

@section('konten')
    <h5>Form Edit Post</h5>
    <form action="{{ url('post/' . $editData->id) }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="title" value="{{ $editData->title }}">
        </div>
        <div class="mb-3">
            <label for="content">Konten Blog Post</label>
            <textarea name="content" id="content" class="form-control">{{ $editData->content }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="/post" class="btn btn-warning">Cancel</a>
    </form>
@endsection
