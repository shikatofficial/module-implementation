<?php

namespace Modules\Blog\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Blog\App\Models\Post;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Post::all();
        return view('blog::index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully!');
    
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Post::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog post not found!');
        }

        return view('blog::edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = Post::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog post not found!');
        }

        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Post::find($id);

        if (!$blog) {
            return redirect()->route('blog.index')->with('error', 'Blog post not found!');
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully!');
    
    }
}
