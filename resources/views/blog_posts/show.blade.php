@extends('layouts.app')

@section('content')
    <h1>{{ $blogPost->title }}</h1>
    <h2>{{ $blogPost->subtitle }}</h2>
    <p><strong>Author:</strong> {{ $blogPost->author_name }}</p>
    <p><strong>Date:</strong> {{ $blogPost->date->format('d M, Y') }}</p>
    <img src="{{ asset('storage/' . $blogPost->main_image) }}" alt="{{ $blogPost->title }}" style="width:100%; max-width:400px;">
    <div>
        <h3>Description</h3>
        <p>{{ $blogPost->description }}</p>
    </div>
    <div>
        <h3>Ancillary Images</h3>
        @if(!empty($blogPost->ancillary_images) && json_decode($blogPost->ancillary_images))
            @foreach(json_decode($blogPost->ancillary_images) as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Ancillary Image" style="width:100px; height:auto;">
            @endforeach
        @else
            <p>No ancillary images available.</p>
        @endif
    </div>
    <div>
        @can('update', $post)
            <a href="{{ route('blog_posts.edit', $post) }}">Edit</a>
        @endcan
    </div>
@endsection
