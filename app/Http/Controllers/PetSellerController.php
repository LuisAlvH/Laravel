<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pet;


class PetSellerController extends Controller
{


    public function viewAddPet()
    {

        $allUsser = User::where('usertype', 'user')->get();


        return view('vendor.addPet', compact('allUsser'));
    }

    public function viewCreatePet(Request $request)
    {
        $userId = $request->input('userSelec');
        return view('vendor.createPet', compact('userId'));
    }

    public function viewPet(Request $request)
    {

        $allUsser = User::where('usertype', 'user')->get();

        $userId = $request->input('userSelec');


        $Mascotas = [];
        if ($userId !== NULL) {
            $Mascotas = Pet::where('client_id', $userId)->get();
        }

        return view('vendor.viewsPet', compact('allUsser', 'Mascotas'));
    }

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
            'nacimiento' => 'required|date|before_or_equal:today',
            'userId' => 'required|exists:users,id',
        ]);


        $mascota = new Pet();
        $mascota->name = $request->nombre;
        $mascota->species = $request->especie;
        $mascota->race = $request->raza;
        $mascota->date_of_birth = $request->nacimiento;
        $mascota->client_id = $request->userId;
        $mascota->save();


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
            'nacimiento' => 'required|date|before_or_equal:today',
        ]);



        $mascota = Pet::find($request->id_registro);

        $mascota->name = $request->nombre;
        $mascota->species = $request->especie;
        $mascota->race = $request->raza;
        $mascota->date_of_birth = $request->nacimiento;
        $mascota->save();



        return redirect()->route('vendor.viewsPet')->with('success', 'Mascota actualizada exitosamente');
    }

    public function destroy($id_registro)
    {

        $mascota = Pet::find($id_registro);
        $mascota->delete();

        return redirect()->route('vendor.viewsPet');
    }
}
