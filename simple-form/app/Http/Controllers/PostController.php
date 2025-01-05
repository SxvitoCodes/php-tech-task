<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|min:5|max:450',
        ]);

        Post::create($validated);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    public function destroy(Post $id) {
        $id->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully!');
    }
}
