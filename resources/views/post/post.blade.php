@extends('template')

@section('konten')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-bg-secondary text-center">CRUD Blog</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
                <tr>
                    {{--  $loop->iteration = Menampilakan Number Loop Saat ini sesuai Jumlah Barisnya Starts dari 1 --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->users->name }} ({{ $post->users->role }})</td>
                    <td>
                        <a href="{{ url('post/' . $post->id . '/edit') }}" class="btn btn-outline-warning btn-sm">Edit</a>
                        <form action="{{ url('post/' . $post->id) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        <a href="{{ url('post/create') }}" class="btn btn-outline-primary ms-auto">Tambah</a>
    </div>
@endsection
<div></div>
