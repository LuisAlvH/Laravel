<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileClientController extends Controller
{
    public function __invoke(){
        return view('clientProfile');
    }
}
