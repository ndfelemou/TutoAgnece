<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'john@doe.gn',
        ]);
        $options = Option::factory(20)->create();
        Property::factory(100)
            ->hasAttached($options->random(3))
            ->create();
    }
}
