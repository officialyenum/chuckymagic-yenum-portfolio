<?php

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@yenum.dev')->first();

        $category1 = Category::create([
            'image' => 'img/categories/code.jpeg',
            'title' => 'Application',
            'slug' => Str::slug('Application'),
            'description' => 'This is application category'
        ]);
        $category2 = Category::create([
            'image' => 'img/categories/photography.jpeg',
            'title' => 'Programming',
            'slug' => Str::slug('Programming'),
            'description' => 'This is Programming category'
        ]);

        $category3 = Category::create([
            'image' => 'img/categories/code.jpeg',
            'title' => 'Projects',
            'slug' => Str::slug('Projects'),
            'description' => 'This is Projects category'
        ]);

        $category4 = Category::create([
            'image' => 'img/categories/videoedit.jpeg',
            'title' => 'Stories',
            'slug' => Str::slug('Stories'),
            'description' => 'This is Stories category'
        ]);

        $post1 = $user->posts()->create([
            'title' => 'After Work Chills',
            'slug' => Str::slug('After Work Chills'),
            'description' => 'After Work Chill is a community web application for working class proffesionals who wants to connect and do more',
            'category_id' => $category1->id,
            'content' => 'After Work Chill is a community web application for working class proffesionals who wants to connect and do more',
            'featured_image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project1.jpg',
            'github_url' => 'https://github.com/officialyenum/chuckymagic-awc',
            'playstore_url' => '',
            'appstore_url' => '',
            'published_at' => now(),
            'web_url' => 'https://afterworkchills.com',
        ]);

        $post2 = $user->posts()->create([
            'title' => 'Magic Switch',
            'slug' => Str::slug('Magic Switch'),
            'description' => 'Magic Switch is an iOS mobile game application built with swift',
            'category_id' => $category1->id,
            'content' => "Magic Switch is an iOS mobile game application built with swift",
            'featured_image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project2.jpg',
            'github_url' => 'https://github.com/officialyenum/chuckymagic-awc',
            'playstore_url' => '',
            'appstore_url' => '',
            'published_at' => now(),
            'web_url' => '',
        ]);

        $tag1 = Tag::create([
            'image' => 'img/tags/laravel.jpeg',
            'title' => 'laravel',
            'slug' => Str::slug('Laravel'),
            'description' => 'This is Laravel category'
        ]);

        $tag2 = Tag::create([
            'image' => 'img/tags/xcode.jpeg',
            'title' => 'Xcode',
            'slug' => Str::slug('Xcode'),
            'description' => 'This is Xcode category'
        ]);

        $tag3 = Tag::create([
            'image' => 'img/tags/vscode.png',
            'title' => 'Vs Code',
            'slug' => Str::slug('Vs Code'),
            'description' => 'This is Vs Code category'
        ]);

        $tag4 = Tag::create([
            'image' => 'img/tags/xcode.jpeg',
            'title' => 'VueJs',
            'slug' => Str::slug('VueJs'),
            'description' => 'This is VueJs category'
        ]);

        $tag5 = Tag::create([
            'image' => 'img/tags/xcode.jpeg',
            'title' => 'NodeJs',
            'slug' => Str::slug('NodeJs'),
            'description' => 'This is NodeJs category'
        ]);

        $tag6 = Tag::create([
            'image' => 'img/tags/androidstudio.jpeg',
            'title' => 'Android Studio',
            'slug' => Str::slug('Android Studio'),
            'description' => 'This is Android Studio category'
        ]);

        $tag7 = Tag::create([
            'image' => 'img/tags/flutter.png',
            'title' => 'Flutter',
            'slug' => Str::slug('Flutter'),
            'description' => 'This is Flutter category'
        ]);

        $post1->tags()->attach([$tag1->id]);

        $post2->tags()->attach([$tag2->id]);
    }
}
