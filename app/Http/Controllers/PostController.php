<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Auth::user()->posts()->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = new Post($request->validated());
        $post->user()->associate(Auth::user());
        if($request->has('publish')){
            $post->published_at = Carbon::now();
        }
        $post->save();
        if($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('public');
                $image = new Image();
                $image->path = $path;
                $image->post()->associate($post);
                $image->save();
            }
        }
        return response()->redirectToRoute('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return void
     */
    public function show(Post $post): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post): View|Factory|Application
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->fill($request->validated());
        if($request->has('publish')){
            $post->published_at = Carbon::now();
        }
        $post->save();
        return response()->redirectToRoute('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Post $post): RedirectResponse
    {
        if(Auth::user() === $post->user) {
            $post->delete();
            return response()->redirectToRoute('admin.posts.index');
        }
        throw(new AuthorizationException());
    }
}
