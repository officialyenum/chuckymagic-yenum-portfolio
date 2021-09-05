<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_post_created_successfully()
    {
        $length = count(Post::all());

        // $response->assertStatus(201);
        $this->assertTrue(count(Post::all()) > $length);
    }
}
