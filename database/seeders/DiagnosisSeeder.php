<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosis;
use App\Models\Pet;
use Faker\Factory as Faker;

class DiagnosisSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $diagnosisDescriptions = [
            'Infeccion respiratoria aguda.',
            'Trastorno gastrointestinal leve.',
            'Condicion dermatologica cronica.',
            'Dolor articular moderado.',
            'Parasitos internos detectados.',
            'Alergia alimentaria detectada.',
            'Infeccion de la piel por bacterias.',
            'Calculos renales leves.',
            'Enfermedad dental en fase inicial.',
            'Deshidratación leve.',
        ];

        $pets = Pet::all();

        foreach ($pets as $pet) {
            $diagnosisSample = collect($diagnosisDescriptions)->random(3);

            foreach ($diagnosisSample as $description) {
                Diagnosis::create([
                    'description' => $description,
                    'pet_id' => $pet->id,
                    'date' => now(),
                ]);
            }
        }
    }
}
