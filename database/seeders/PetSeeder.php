<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\User;

class PetSeeder extends Seeder
{
    public function run()
    {
        $client = User::where('email', 'cliente@example.com')->first();
        if ($client) {
            Pet::factory()->count(3)->create([
                'client_id' => $client->id,
            ]);
        }
    }
}

