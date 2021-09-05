<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'https://yenum.s3.us-east-2.amazonaws.com/projects/project1.jpg',
            'title' => $this->faker->title(),
            'slug' => Str::slug($this->faker->title()),
            'description' => $this->faker->sentence(random_int(6,12))
        ];
    }
}


