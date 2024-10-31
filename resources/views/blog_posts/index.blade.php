<!-- resources/views/blog_posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>
    @if (Auth::check())
        <a href="{{ route('blog_posts.create') }}" class="btn btn-primary">Create Post</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Author</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blog_posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subtitle }}</td>
                    <td>{{ $post->author_name }}</td>
                    <td>{{ $post->date->format('d M, Y') }}</td>
                    @auth
                    <td>
                        <a href="{{ route('blog_posts.show', $post->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('blog_posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('blog_posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
