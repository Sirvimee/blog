@extends('layout')
@section('title', 'Posts')
@section('content')
    <a href="{{url()->previous() == url()->current() ? route('posts') : url()->previous()}}" class="btn btn-primary">Back</a>
    @include('partials.post-card', ['isView'=>true])
    <div class="card mb-3">
        <div class="card-body">
            <form method="POST" action="{{route('post.comment', ['post' => $post])}}">
                @csrf
                @error('body')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
                <div class="mb-3">
                    <label class="w-100">
                        <textarea class="form-control" rows="3" name="body" placeholder="Write something cool..."></textarea>
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" value="Comment">
            </form>
        </div>
    </div>
    @foreach($post->comments()->latest()->get() as $comment)
        <div class="card mb-3">
            <div class="card-body">
                {{$comment->body}}
                <p class="muted-text">{{$comment->user->name}}</p>
                <p class="muted-text">{{$comment->created_at->diffForHumans()}}</p>
            </div>
        </div>
    @endforeach

@endsection

@push('js')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
