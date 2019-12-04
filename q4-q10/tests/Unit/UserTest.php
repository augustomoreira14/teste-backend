<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Domain\User;
use App\Domain\Address;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddressAssigment()
    {
        $address = factory(Address::class)->create();

        $user = factory(User::class)->make();
        $user->address()->associate($address);
        $user->save();

        $this->assertEquals($address, $user->address);
    }

    public function testSoftDelete()
    {
        $user = factory(User::class)->create();

        $user->delete();

        $this->assertCount(0,User::all());
        $this->assertCount(1, User::withTrashed()->get());
    }
}
