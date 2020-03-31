<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use App\Category;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
        factory(Tag::class, 5)->create();
        factory(Category::class, 5)->create();
        factory(Post::class, 10)->create();
    }
}
