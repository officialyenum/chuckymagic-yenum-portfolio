<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_created_successfully()
    {
        $length = count(Post::all());
        $response = $this->post('/posts/create',[

        ]);

        $response->assertStatus(201);
        $this->assertTrue(count(Post::all())> $length);
    }
}
