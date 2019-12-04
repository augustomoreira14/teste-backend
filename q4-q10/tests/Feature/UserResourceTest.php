<?php

namespace Tests\Feature;

use App\Domain\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function testCreateUserWithoutAddress($data)
    {
        unset($data["address"]);

        $response = $this->postJson("/api/users", $data);

        $response->assertCreated();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testCreateUserWithAddress($data)
    {
        $response = $this->postJson("/api/users", $data);

        $response->assertCreated();
    }

    public function testFailsCreationWithExistingEmail()
    {
        $user = factory(User::class)->create();

        $response = $this->postJson("/api/users", $user->toArray());

        $response->assertStatus(422);
    }

    public function dataProvider()
    {
        return [
            [
                [
                    "name" => "user 1",
                    "email" => "user@test.com",
                    "phone" => "98999999999",
                    "username" => "user1",
                    "address" => [
                        'number' => 123,
                        'street' => "street",
                        'complement' => "complement",
                        'district' => "district",
                        'city' => "São Luís",
                        'state' => "MA",
                        'zipCode' => "6554545"
                    ]
                ]
            ]
        ];
    }
}