<!-- resources/views/blog_posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Blog Post</h1>
    
    <form action="{{ route('blog_posts.update', $blog_post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('blog_posts.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
