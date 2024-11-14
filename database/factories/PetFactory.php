<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Carbon\Carbon;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'species' => $this->faker->randomElement(['Perro', 'Gato', 'Ave', 'Pez']),
            'race' => $this->faker->word,
            'date_of_birth' => Carbon::parse('2020-01-01'),
            'client_id' => null,
        ];
    }
}

