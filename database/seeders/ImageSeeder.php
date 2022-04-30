<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
//        foreach($posts as $post ){
//
//        }
        $posts->each(function ($post) {
            Image::factory(rand(0,3))->create(['post_id' => $post->id]);
        });
    }
}
