<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            $address = factory(\App\Domain\Address::class)->create();
            $user = factory(\App\Domain\User::class)->make();

            $user->address()->associate($address);

            $user->save();
        }
    }
}
