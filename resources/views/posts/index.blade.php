
@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>


    @foreach ($posts as $post)
        <div class="card mb-3">
        <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top img-fluid d-block mx-auto" alt="Artwork" style="max-width: 400px;">
        <div class="card-body">
        <h5 class="card-title">{{ $post->user ? $post->user->name : 'No User' }}</h5>
        <p class="card-text">{{ $post->description }}</p>
                <p class="card-text"><small class="text-muted">Category: {{ $post->category }}</small></p>
                <p class="card-text"><small class="text-muted">Posted at: {{ $post->post_time }}</small></p>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                <br>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
            </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
