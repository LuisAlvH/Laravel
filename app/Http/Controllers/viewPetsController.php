<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\Pet;


class viewPetsController extends Controller
{


    public function showPets()
    {
        $pets = Pet::where('client_id', auth()->id())->get();
        return view('viewPets', compact('pets'));
    }


    public function savePet(Request $request): RedirectResponse
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'nacimiento' => 'required|date',
            'userId' => 'required|exists:users,id',
        ]);

        // Crear una nueva mascota
        $mascota = new Pet();
        $mascota->name = $request->nombre;
        $mascota->species = $request->especie;
        $mascota->race = $request->raza;
        $mascota->date_of_birth = $request->nacimiento;
        $mascota->client_id = $request->userId;
        $mascota->save();

        // Redireccionar con mensaje de éxito
        return redirect()->route('vendor.addPet')->with('success', 'Mascota registrada exitosamente');
    }


    public function edit($id_registro)
    {
        $mascota = Pet::find($id_registro);
        if (!$mascota) {
            return redirect()->route('vendor.viewsPet')->with('error', 'Mascota no encontrada.');
        }

        return view('vendor.editPet', compact('mascota'));
    }
    public function update(Request $request)
    {


        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'nacimiento' => 'required|date',
        ]);



        $mascota = Pet::find($request->id_registro);

        $mascota->name = $request->nombre;
        $mascota->species = $request->especie;
        $mascota->race = $request->raza;
        $mascota->date_of_birth = $request->nacimiento;
        $mascota->save();



        return redirect()->route('vendor.viewsPet');
    }

    public function destroy($id_registro)
    {

        $mascota = Pet::find($id_registro);
        $mascota->delete();

        return redirect()->route('vendor.viewsPet');
    }
}
