@extends('layout')
@section('title', 'Posts')
@section('content')
    <h1>Posts</h1>
    {{$posts->links()}}
    <div class="row row-cols-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card">
                    @if($post->images->count() == 1)

                            <img src="{{$post->images[0]->path}}" class="card-img-top" alt="...">
                    @elseif($post->images->count() > 1)
                        @include('partials.carousel', ['id' => $post->id, 'images' => $post->images])
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{ $post->snippet }}</p>
                        <p class="text-muted" data-bs-toggle="tooltip" title="{{$post->published_at}}">{{ $post->published_at->diffForHumans() }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@push('js')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
