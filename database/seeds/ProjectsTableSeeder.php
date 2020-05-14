<?php

use App\Category;
use App\Language;
use App\SubCategory;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','oponechukwuyenum@gmail.com')->first();

        $category1 = Category::create([
            'image' => 'img/categories/code.jpeg',
            'name' => 'Application'
        ]);
        $category2 = Category::create([
            'image' => 'img/categories/photograpy.jpeg',
            'name' => 'Photography'
        ]);
        $category3 = Category::create([
            'image' => 'img/categories/videoedit.jpeg',
            'name' => 'Film'
        ]);

        $subCategory1 = SubCategory::create([
            'image' => 'img/categories/game.jpeg',
            'name' => 'Game App'
        ]);

        $subCategory2 = SubCategory::create([
            'image' => 'img/categories/code.jpeg',
            'name' => 'Mobile App'
        ]);

        $subCategory3 = SubCategory::create([
            'image' => 'img/categories/code.jpeg',
            'name' => 'Web App'
        ]);

        $project1 = $user->projects()->create([
            'title' => 'After Work Chills',
            'description' => 'After Work Chill is a community web application for working class proffesionals who wants to connect and do more',
            'content' => 'Laravel Built Application blah blah blah....',
            'category_id' => $category1->id,
            'image' => 'projects/2.jpg',
            'github_url' => 'https://github.com/officialyenum/chuckymagic-awc',
            'playstore_url' => '',
            'appstore_url' => '',
            'web_url' => 'https://afterworkchills.com',
        ]);

        $project2 = $user->projects()->create([
            'title' => 'Magic Switch',
            'description' => 'Magic Switch is an iOS mobile game application built with swift',
            'content' => 'Laravel Built Application blah blah blah....',
            'category_id' => $category1->id,
            'image' => 'projects/2.jpg',
            'github_url' => 'https://github.com/officialyenum/chuckymagic-awc',
            'playstore_url' => '',
            'appstore_url' => '',
            'web_url' => 'https://afterworkchills.com',
        ]);

        $tag1 = Tag::create([
            'image' => 'img/tags/laravel.jpeg',
            'name' => 'laravel'
        ]);

        $tag2 = Tag::create([
            'image' => 'img/tags/xcode.jpeg',
            'name' => 'Xcode'
        ]);

        $tag3 = Tag::create([
            'image' => 'img/tags/vscode.png',
            'name' => 'Vs Code'
        ]);

        $tag4 = Tag::create([
            'image' => 'img/tags/xcode.jpeg',
            'name' => 'VueJs'
        ]);

        $tag5 = Tag::create([
            'image' => 'img/tags/xcode.jpeg',
            'name' => 'NodeJs'
        ]);

        $tag6 = Tag::create([
            'image' => 'img/tags/androidstudio.jpeg',
            'name' => 'Android Studio'
        ]);

        $tag7 = Tag::create([
            'image' => 'img/tags/flutter.jpeg',
            'name' => 'Flutter'
        ]);

        $language1 = Language::create([
            'image' => 'img/tags/androidstudio.jpeg',
            'name' => 'Java'
        ]);

        $language2 = Language::create([
            'image' => 'img/tags/xcode.jpeg',
            'name' => 'Swift'
        ]);

        $language3 = Language::create([
            'image' => 'img/tags/php.png',
            'name' => 'Php'
        ]);

        $language4 = Language::create([
            'image' => 'img/tags/mysql.png',
            'name' => 'MySQL'
        ]);

        $language5 = Language::create([
            'image' => 'img/tags/dart.png',
            'name' => 'Dart'
        ]);


        $language6 = Language::create([
            'image' => 'img/tags/vscode.png',
            'name' => 'Html'
        ]);


        $language7 = Language::create([
            'image' => 'img/tags/vscode.png',
            'name' => 'Css'
        ]);


        $language8 = Language::create([
            'image' => 'img/tags/javascript.png',
            'name' => 'Javascript'
        ]);

        $language9 = Language::create([
            'image' => 'img/tags/javascript.jpeg',
            'name' => 'jQuery'
        ]);

        $language10 = Language::create([
            'image' => 'img/tags/dart.png',
            'name' => 'C++'
        ]);

        $language11 = Language::create([
            'image' => 'img/tags/dart.png',
            'name' => 'C#'
        ]);

        $category1->subCategories()->attach([$subCategory1->id,$subCategory2->id,$subCategory3->id]);

        $project1->tags()->attach([$tag1->id]);
        $project1->subCategories()->attach([$subCategory3->id]);
        $project1->languages()->attach([$language3->id, $language6->id , $language7->id, $language8->id]);


        $project2->tags()->attach([$tag2->id]);
        $project2->subCategories()->attach([$subCategory1->id, $subCategory2->id]);
        $project2->languages()->attach([$language2->id]);
    }
}
