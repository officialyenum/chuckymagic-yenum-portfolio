<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Tag::truncate();
        Post::truncate();
        DB::table('post_tag')->truncate();

        User::flushEventListeners();
        Category::flushEventListeners();
        Tag::flushEventListeners();
        Post::flushEventListeners();

        $usersQuantity = 10;
        $postsQuantity = 10;
        $categoriesQuantity = 20;
        $tagsQuantity = 50;
        $this->call(UsersTableSeeder::class);

        User::factory()->count($usersQuantity)->create();
        Category::factory()->count($categoriesQuantity)->create();
        Tag::factory()->count($tagsQuantity)->create();
        Post::factory()->count($postsQuantity)->create()->each(
            function ($post) {
                $tags = Tag::all()->random(mt_rand(1, 5))->pluck('id');
                $post->tags()->attach($tags);
            }
        );

        // $this->call(PostsTableSeeder::class);
    }
}
