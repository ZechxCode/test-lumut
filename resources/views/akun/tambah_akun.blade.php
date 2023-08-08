@extends('template')

@section('konten')
    {{-- {{ dd(session('error')) }} --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('store.register') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Username(Unique)</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" id="">
                <Option>Pilih Role</Option>
                <Option value="admin">admin</Option>
                <Option value="author">author</Option>
            </select>
        </div>


        <div class="mb-3">
            <button type="submit" class="btn btn-danger float-end">Submit</button>
        </div>
    </form>
@endsection
<div></div>
