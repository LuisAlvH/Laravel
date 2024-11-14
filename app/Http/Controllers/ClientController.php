<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use View;

class ClientController extends Controller
{
    public function __invoke()
    {
        return view('home_client');
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('clientProfile', compact('user'));
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


        return redirect()->route('clientProfile')->with('success', 'Perfil actualizado exitosamente');
    }
}
