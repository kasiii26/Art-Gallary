@extends('admin.admin-partials._user-post')
@extends('admin.admin-partials._sidebar')
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Posts</h1>
    @foreach ($posts as $post)
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="Artwork">
            <div class="card-body">
                <h5 class="card-title">{{ $post->description }}</h5>
                <p class="card-text"><small class="text-muted">Category: {{ $post->category }}</small></p>
                <p class="card-text"><small class="text-muted">Posted at: {{ $post->post_time }}</small></p>
            </div>
        </div>
    @endforeach
</div>
@endsection