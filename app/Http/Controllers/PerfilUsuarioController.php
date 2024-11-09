<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilUsuarioController extends Controller
{
    public function viewAddSeller(){
        return view('vendor.sellerProfile');
    }

    
}
