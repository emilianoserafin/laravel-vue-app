<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //creates 4 users
        $users = User::factory(4)->create();
        //creates 7 Properties
        Property::factory(7)->create(
            (function () use ($users) {
                return [
                    'user_id' => $users->random()->id,
                ];
            })
        );
    }
}
