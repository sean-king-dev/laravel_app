<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller; // Make sure to include this

class BlogPostController extends Controller
{
    public function __construct()
    {
        // Apply the auth middleware to the create and store methods
        $this->middleware('auth')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all blog posts
        $blog_posts = BlogPost::all();
        return view('blog_posts.index', compact('blog_posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a new blog post
        return view('blog_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store a new blog post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'ancillary_images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('images', 'public');
        }

        if ($request->hasFile('ancillary_images')) {
            $ancillary_images = [];
            foreach ($request->file('ancillary_images') as $file) {
                $ancillary_images[] = $file->store('images', 'public');
            }
            $validated['ancillary_images'] = json_encode($ancillary_images);
        }

        // Set the author_id to the currently authenticated user's ID
        $validated['author_id'] = Auth::id(); 

        BlogPost::create($validated);

        return redirect()->route('blog_posts.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        // Show a single blog post
        return view('blog_posts.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        // Check if the authenticated user is the author of the blog post
        $this->authorize('update', $blogPost);

        // Show the form to edit the blog post
        return view('blog_posts.edit', compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        // Check if the authenticated user is the author of the blog post
        $this->authorize('update', $blogPost);

        // Validate and update the blog post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'ancillary_images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('images', 'public');
        }

        if ($request->hasFile('ancillary_images')) {
            $ancillary_images = [];
            foreach ($request->file('ancillary_images') as $file) {
                $ancillary_images[] = $file->store('images', 'public');
            }
            $validated['ancillary_images'] = json_encode($ancillary_images);
        }

        $blogPost->update($validated);

        return redirect()->route('blog_posts.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        // Check if the authenticated user is the author of the blog post
        $this->authorize('delete', $blogPost);

        // Delete the blog post
        $blogPost->delete();
        return redirect()->route('blog_posts.index')->with('success', 'Blog post deleted successfully.');
    }
}
