<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;


class viewPetsController extends Controller
{
    //public function index(){
       // return view('viewPets');
    //}

    public function showPets()
{
    $pets = Pet::where('client_id', auth()->id())->get();
    return view('viewPets', compact('pets'));
}

}
