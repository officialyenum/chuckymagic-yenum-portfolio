<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function test_user_can_edit_his_profile() {
        $user = User::first();

        $token = Auth::loginUsingId($user->id);

        $attributes = ['name' => $this->faker->name];

        $this->patchJson('api/user/profile', $attributes, ['authorization' => "bearer $token"])
            ->assertStatus(200);

        $this->assertDatabaseHas($user->getTable(), array_merge($attributes, [
            'id' => $user->id
        ]));
    }
}
