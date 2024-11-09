<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MascVendedorController extends Controller
{
    public function viewAddPet(){
        return view('vendor.addPet');

    }

    public function viewPet(){
        return view('vendor.viewsPet');
    }

   

}
