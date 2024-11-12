<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function viewAddInvoice()
    {
        return view('vendor.issueInvoice');
    }
    public function viewInvoice()
    {
        return view('vendor.viewsInvoice');
    }
}
