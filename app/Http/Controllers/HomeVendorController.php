<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeVendorController extends Controller
{
    public function index(){
        return view('vendor.dashboard');
    }
    
}