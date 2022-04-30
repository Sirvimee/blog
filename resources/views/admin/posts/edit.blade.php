@extends('layout')
@section('title', 'Edit ' . $post->title)

@section('content')
    <form action="{{route('admin.posts.update', ['post' => $post])}}" method="POST">
        @method('PUT')
        @csrf
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') ?? $post->title}}">
        </div>
        @error('body')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="12" name="body" placeholder="Write something cool...">{{old('body') ?? $post->body}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        @unless($post->published_at)
            <input type="submit" class="btn btn-primary" value="Publish" formaction="{{route('admin.posts.update', ['post' => $post]) . '?publish=true'}}">
        @endif
    </form>
@endsection
