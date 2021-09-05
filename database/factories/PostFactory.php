<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'slug' => Str::slug($this->faker->title()),
            'description' => $this->faker->sentence(random_int(6,12)),
            'category_id' =>random_int(1,6),
            'content' => $this->faker->sentence(random_int(30,120)),
            'featured_image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project1.jpg',
            'published_at' => now(),
        ];
    }
}

