<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Category::factory()->create();
        Tag::factory()->create();
        Post::factory(2000)->create();
        Image::factory(2000)->create();
        CategoryPost::factory()->create();
        PostTag::factory()->create();
    }
}
