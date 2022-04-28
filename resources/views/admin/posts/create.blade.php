@extends('layout')
@section('title', 'New Post')

@section('content')
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="12" name="body" placeholder="Write something cool..."></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
@endsection
