@extends('template')

@section('konten')
    <h1 class="text-bg-secondary text-center">List Blog</h1>
    <div class="container">
        <div class="row">
            @foreach ($blog as $post)
                <div class="col-12">
                    <div class="mb-3">
                        <h1>{{ $post->title }}</h1>
                        <span class="text-secondary">{{ $post->users->name }} ({{ $post->users->role }}) ,
                            {{ $post->updated_at }}</span>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
