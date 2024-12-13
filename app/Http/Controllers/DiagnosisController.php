<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Diagnosis;
use Auth;

class DiagnosisController extends Controller
{
    public function viewAddDiagnosis(Request $request)
    {
        $clients = User::where('usertype', 'user')->get();
        $pets = null;
        if ($request->has('client_id') && $request->client_id) {
            $pets = Pet::where('client_id', $request->client_id)->get();
        }
        return view('vendor.addDiagnosis', compact('clients', 'pets'));
    }

    public function viewDiagnosis(Request $request)
    {
        $clients = User::where('usertype', 'user')->get();
        $pets = null;
        $diagnoses = null;

        if ($request->has('client_id')) {
            $pets = Pet::where('client_id', $request->client_id)->get();

            if ($request->has('pet_id')) {
                $diagnoses = Diagnosis::where('pet_id', $request->pet_id)->get();
            }
        }

        return view('vendor.viewsDiagnosis', compact('clients', 'pets', 'diagnoses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'description' => 'required|string',
            'date' => 'required|date|before_or_equal:today',
        ]);

        Diagnosis::create([
            'client_id' => $request->client_id,
            'pet_id' => $request->pet_id,
            'description' => $request->description,
            'date' => $request->date,
            'employee_id' => Auth::id(),
        ]);

        return redirect()->route('vendor.addDiagnosis')->with('success', 'Diagnostico agregado correctamente.');
    }

    public function getPets(Request $request)
    {
        $clientId = $request->client_id;
        $pets = Pet::where('client_id', $clientId)->get();

        return response()->json($pets);
    }

    public function getDiagnosisByPet(Request $request)
    {
        $petId = $request->input('pet_id');
        $diagnoses = Diagnosis::where('pet_id', $petId)->get();
        return response()->json($diagnoses);
    }

    public function destroy($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->delete();

        return redirect()->route('vendor.viewsDiagnosis')->with('success', 'Diagnostico eliminado exitosamente.');
    }

    public function edit($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $pets = Pet::where('client_id', $diagnosis->pet->client_id)->get();

        return view('vendor.editDiagnosis', compact('diagnosis', 'pets'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'date' => 'required|date|before_or_equal:today',
        ]);

        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->update($validated);

        return redirect()->route('vendor.viewsDiagnosis')->with('success', 'Diagnostico actualizado exitosamente.');
    }

    public function show($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return view('vendor.showDiagnosis', compact('diagnosis'));
    }
}
