<?php

namespace Tests\Feature;

use App\Domain\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTokenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetToken()
    {
        $user = factory(User::class)->create();

        $response = $this->postJson("api/auth/get_token", [
            "email" => $user->email,
            "password" => 'password'
        ]);

        $response->assertOk();
        $response->assertJson(["api_token" => $user->api_token]);
    }

    public function testFailedGetToken()
    {
        $user = factory(User::class)->create();

        $response = $this->postJson("api/auth/get_token", [
            "email" => $user->email,
            "password" => "123"
        ]);

        $response->assertUnauthorized();
    }
}
