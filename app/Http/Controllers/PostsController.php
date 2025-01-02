<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:500',
            'category' => 'required|string|max:100',
            'post_time' => 'required|date',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');

        Post::create([
            'image_path' => $imagePath,
            'description' => $request->description,
            'category' => $request->category,
            'post_time' => now(),
            'user_id' => auth()->id(), // Assuming you track the user
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');


        Post::create([
            'user_id' => Auth::id(),
            'image_path' => $path,
            'description' => $request->description,
            'category' => $request->category,
            'post_time' => $request->post_time,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
    }
    public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('posts.edit', compact('post'));
}
public function update(Request $request)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'description' => 'required|string',
        'category' => 'required|string',
    ]);

    $post = Post::findOrFail($request->post_id);

    if (Auth::user()->id !== $post->user_id && Auth::user()->role !== 1) {
     return redirect()->route('posts.index')->with('error', 'You are not authorized to update this post.');
    }

    if ($request->hasFile('image')) {
        // Store the new image
        $path = $request->file('image')->store('posts', 'public');
        $post->image_path = $path;
    }

    // Update other fields
    $post->description = $request->description;
    $post->category = $request->category;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}
public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post
        if (Auth::user()->id !== $post->user_id && Auth::user()->role !== 1) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to delete this post.');
        }

        // Delete the associated image if necessary
        if ($post->image_path && Storage::exists($post->image_path)) {
            Storage::delete($post->image_path);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

}
