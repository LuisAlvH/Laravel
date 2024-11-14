<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilUsuarioController extends Controller
{


    public function showProfile()
    {
        $user = Auth::user();
        return view('vendor.sellerProfile', compact('user'));
    }




    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',

        ]);


        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->direccion = $request->input('direccion');

        $user->save();


        return redirect()->route('vendor.sellerProfile')->with('success', 'Perfil actualizado exitosamente');
    }
}
