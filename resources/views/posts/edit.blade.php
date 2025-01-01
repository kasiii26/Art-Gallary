<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Post</h1>
        @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
        @endif
        <form action="{{ route('EditPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $post->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="" disabled>Select a category</option>
                    <option value="Contemporary Art" {{ $post->category == 'Contemporary Art' ? 'selected' : '' }}>Contemporary Art</option>
                    <option value="Modern Art" {{ $post->category == 'Modern Art' ? 'selected' : '' }}>Modern Art</option>
                    <option value="Classical Art" {{ $post->category == 'Classical Art' ? 'selected' : '' }}>Classical Art</option>
                    <option value="Renaissance Art" {{ $post->category == 'Renaissance Art' ? 'selected' : '' }}>Renaissance Art</option>
                    <option value="Baroque Art" {{ $post->category == 'Baroque Art' ? 'selected' : '' }}>Baroque Art</option>
                    <option value="Romanticism" {{ $post->category == 'Romanticism' ? 'selected' : '' }}>Romanticism</option>
                    <option value="Abstract Art" {{ $post->category == 'Abstract Art' ? 'selected' : '' }}>Abstract Art</option>
                    <option value="Impressionism" {{ $post->category == 'Impressionism' ? 'selected' : '' }}>Impressionism</option>
                    <option value="Expressionism" {{ $post->category == 'Expressionism' ? 'selected' : '' }}>Expressionism</option>
                    <option value="Surrealism" {{ $post->category == 'Surrealism' ? 'selected' : '' }}>Surrealism</option>
                    <option value="Pop Art" {{ $post->category == 'Pop Art' ? 'selected' : '' }}>Pop Art</option>
                    <option value="Folk Art" {{ $post->category == 'Folk Art' ? 'selected' : '' }}>Folk Art</option>
                    <option value="Digital Art" {{ $post->category == 'Digital Art' ? 'selected' : '' }}>Digital Art</option>
                    <option value="Performance Art" {{ $post->category == 'Performance Art' ? 'selected' : '' }}>Performance Art</option>
                    <option value="Street Art and Graffiti" {{ $post->category == 'Street Art and Graffiti' ? 'selected' : '' }}>Street Art and Graffiti</option>
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
