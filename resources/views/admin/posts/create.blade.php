@extends('layout')
@section('title', 'New Post')

@section('content')
    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('title')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{old('title')}}">
        </div>
        @error('body')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="12" name="body" placeholder="Write something cool...">{{old('body')}}</textarea>
        </div>
        @error('image.*')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image[]" multiple accept="image/*">
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        <input type="submit" class="btn btn-primary" value="Publish" formaction="{{route('admin.posts.store') . '?publish=true'}}">
    </form>
@endsection
