<?php

namespace App\Http\Controllers;



class HomeVendorController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard');
    }
}
