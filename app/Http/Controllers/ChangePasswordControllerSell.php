<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordControllerSell extends Controller
{

    public function __invoke(Request $request)
    {
        return view('auth.changePasswordSell');
    }
}
