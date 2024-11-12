<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class MascVendedorController extends Controller
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
}
