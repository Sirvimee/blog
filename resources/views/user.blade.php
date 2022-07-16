@extends('layout')
@section('title', $user->name)
@section('content')

<div class="card">
    <div class="card-body">
        <h1>{{$user->name}}</h1>
        <p class="text-muted">
            <b>Email:</b>
            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
        </p>
        @if($user->profile)
            @if($user->profile->phone)
                <p class="text-muted">
                    <b>Phone:</b>
                    <a href="tel:{{$user->profile->phone}}">{{$user->profile->phone}}</a>
                </p>
            @endif
            @if($user->profile->bio)
                <p class="text-muted">
                    <b>Bio:</b>
                    {{$user->profile->bio}}
                </p>
            @endif
            @if($user->profile->birthdate)
                <p class="text-muted">
                    <b>Birth day:</b>
                    {{$user->profile->birthdate->format('Y-m-d')}}
                </p>
            @endif
        @endif
        @if (Auth::check())
        <a href="{{route('user.follow', ['user' => $user])}}" class="btn btn-primary">
            @if($user->amFollowing)
                Unfollow
            @else
                Follow
            @endif
        </a>
        @endif

        <p class="text-muted">
            <br>
            <b>Followers:</b>
            @forelse($user->followers as $follower)
                {{$follower->name}} ;
            @empty
                No followers yet.
            @endforelse
    </div>
</div>

<div class="row row-cols-4">
    @foreach($posts as $post)
        <div class="col">
            @include('partials.post-card')
        </div>
    @endforeach
</div>


@endsection

