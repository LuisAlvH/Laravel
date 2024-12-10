<?php

namespace App\Http\Controllers;



class HomeSellerController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard');
    }
}
