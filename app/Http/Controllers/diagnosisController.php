<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\Pet;


class diagnosisController extends Controller
{
    public function showDiagnosis($pet_id)
    {
        $pet = Pet::findOrFail($pet_id);
        $diagnoses = Diagnosis::where('pet_id', $pet_id)->orderBy('date', 'desc')->get();

        return view('petDiagnosis', compact('pet', 'diagnoses'));
    }

}
