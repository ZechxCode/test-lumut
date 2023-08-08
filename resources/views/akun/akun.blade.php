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
    <h1 class="text-bg-secondary text-center">Users Managament</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr>
                    {{--  $loop->iteration = Menampilakan Number Loop Saat ini sesuai Jumlah Barisnya Starts dari 1 --}}
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ url('akun/' . $user->id . '/edit') }}" class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="{{ url('akun/' . $user->id . '/editPassword') }}"
                            class="btn btn-outline-warning btn-sm">UbahPassword</a>
                        <form action="{{ url('akun/' . $user->id) }}" method="post" class="d-inline">
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
        <a href="{{ url('akun/create') }}" class="btn btn-outline-primary ms-auto">Tambah</a>
    </div>
@endsection
<div></div>
