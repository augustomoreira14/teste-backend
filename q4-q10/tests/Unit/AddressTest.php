<?php

namespace Tests\Unit;

use App\Domain\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateAddress()
    {
        $address = new Address([
            'number' => 123,
            'street'=> 'street',
            'complement'=> 'complement',
            'district'=> 'district',
            'city' => 'city',
            'state' => 'state',
            'zipCode'=> 'zipcode'
        ]);

        $address->save();

        $this->assertCount(1, Address::all());
    }
}
