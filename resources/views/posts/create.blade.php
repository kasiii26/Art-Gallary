@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

    <div class="mb-3">
        <option value="" disabled>Select a category</option>
        <select name="category" id="category" class="form-control">
        <option value="Contemporary Art" {{ old('category') == 'Contemporary Art' ? 'selected' : '' }}>Contemporary Art</option>
    <option value="Modern Art" {{ old('category') == 'Modern Art' ? 'selected' : '' }}>Modern Art</option>
    <option value="Classical Art" {{ old('category') == 'Classical Art' ? 'selected' : '' }}>Classical Art</option>
    <option value="Renaissance Art" {{ old('category') == 'Renaissance Art' ? 'selected' : '' }}>Renaissance Art</option>
    <option value="Baroque Art" {{ old('category') == 'Baroque Art' ? 'selected' : '' }}>Baroque Art</option>
    <option value="Romanticism" {{ old('category') == 'Romanticism' ? 'selected' : '' }}>Romanticism</option>
    <option value="Abstract Art" {{ old('category') == 'Abstract Art' ? 'selected' : '' }}>Abstract Art</option>
    <option value="Impressionism" {{ old('category') == 'Impressionism' ? 'selected' : '' }}>Impressionism</option>
    <option value="Expressionism" {{ old('category') == 'Expressionism' ? 'selected' : '' }}>Expressionism</option>
    <option value="Surrealism" {{ old('category') == 'Surrealism' ? 'selected' : '' }}>Surrealism</option>
    <option value="Pop Art" {{ old('category') == 'Pop Art' ? 'selected' : '' }}>Pop Art</option>
    <option value="Folk Art" {{ old('category') == 'Folk Art' ? 'selected' : '' }}>Folk Art</option>
    <option value="Digital Art" {{ old('category') == 'Digital Art' ? 'selected' : '' }}>Digital Art</option>
    <option value="Performance Art" {{ old('category') == 'Performance Art' ? 'selected' : '' }}>Performance Art</option>
    <option value="Street Art and Graffiti" {{ old('category') == 'Street Art and Graffiti' ? 'selected' : '' }}>Street Art and Graffiti</option>
</select>

    @error('category')
        <span class="text-danger">{{ $message }}</span>
    @enderror

        <div class="mb-3">
            <label for="post_time" class="form-label">Post Time</label>
            <input type="datetime-local" class="form-control" id="post_time" name="post_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
