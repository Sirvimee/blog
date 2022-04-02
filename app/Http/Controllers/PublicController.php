<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function posts(){
        $posts = Post::simplePaginate(12);

//        dd($posts->toArray());
        return view('posts', compact('posts'));
    }
}
