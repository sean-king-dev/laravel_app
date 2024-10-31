<!-- resources/views/blog_posts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Blog Post</h1>
    
    <form action="{{ route('blog_posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('blog_posts.form')
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
