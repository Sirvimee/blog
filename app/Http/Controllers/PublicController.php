<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function posts(){
        $posts = Post::published()->latest()->paginate(12);

//        dd($posts->toArray());
        return view('posts', compact('posts'));
    }
    public function tag($tag){
        $tag = Tag::where('name', $tag)->firstOrFail();
        $posts = $tag->posts()->whereNotNull('published_at')->latest()->paginate(12);
        return view('posts', compact('posts'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }
    public function user(User $user){
        return view('user', compact('user'));
    }
}
