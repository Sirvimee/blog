<div class="card mb-3">
    @if($post->images->count() == 1)

        <img src="{{$post->images[0]->url}}" class="card-img-top" alt="...">
    @elseif($post->images->count() > 1)
        @include('partials.carousel', ['id' => $post->id, 'images' => $post->images])
    @endif
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        @isset($isView)
            <p class="card-text">{!! $post->displayBody !!}</p>
        @else
            <p class="card-text">{{ $post->snippet }}</p>
        @endif
        <a class="text-muted"><a href="{{route('user', ['user'=> $post->user])}}">{{ $post->user->name }}</a></p>
        <p class="text-muted">
            @foreach($post->tags as $tag)
                <a href="{{route('tag', ['tag' => $tag->name])}}">{{$tag->name}}</a>
            @endforeach
        </p>

        <p class="text-muted" data-bs-toggle="tooltip" title="{{$post->published_at}}">{{ $post->published_at->diffForHumans() }}</p>
        @unless(isset($isView))
            <a href="{{route('post', ['post' => $post])}}" class="btn btn-primary">Read more</a>
        @endunless
    </div>
</div>
