<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName(),
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'verified' => $verified = $faker->randomElement([1, 0]),
        'email_verified_at' => $verified == 0 ? null : now(),
        'remember_token' => $verified == 1 ? null : Str::random(10),
        'verification_token' => $verified == 1 ? null : User::generateVerificationCode(),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->name();
    return [
        'image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project1.jpg',
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(1)
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->name();
    return [
        'image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project1.jpg',
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(1)
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->name();
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(1),
        'category_id' => Category::all()->random()->id,
        'content' => $faker->paragraph(4),
        'featured_image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project1.jpg',
        'published_at' => now(),
        'user_id' => User::all()->random()->id
    ];
});
