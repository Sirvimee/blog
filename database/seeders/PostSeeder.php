<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $tags = Tag::all();
        Post::factory(100)->make()->sortBy('created_at')->each(function(Post $post) use ($users, $tags){
            $postTags = $tags->shuffle()->take(rand(0,4));
            $post->user()->associate($users->random());
            $post->save();
            foreach($postTags as $tag){
                $post->tags()->attach($tag);
            }
        });
    }
}
