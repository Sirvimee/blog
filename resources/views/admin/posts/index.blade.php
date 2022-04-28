@extends('layout')
@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Add Post</a>
    {{$posts->links()}}
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="">View</a>
                        <a class="btn btn-warning" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>Id</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tfoot>
    </table>
    {{$posts->links()}}
@endsection
