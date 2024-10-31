<!-- resources/views/blog_posts/form.blade.php -->

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $blog_post->title ?? '') }}">
</div>

<div class="form-group">
    <label for="subtitle">Subtitle</label>
    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $blog_post->subtitle ?? '') }}">
</div>

<div class="form-group">
    <label for="main_image">Main Image</label>
    <input type="file" name="main_image" class="form-control">
</div>

<div class="form-group">
    <label for="ancillary_images">Ancillary Images</label>
    <input type="file" name="ancillary_images[]" class="form-control" multiple>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $blog_post->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="author_name">Author Name</label>
    <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $blog_post->author_name ?? '') }}">
</div>

<div class="form-group">
    <label for="date">Date</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', isset($blog_post->date) ? $blog_post->date->format('Y-m-d') : '') }}">
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
