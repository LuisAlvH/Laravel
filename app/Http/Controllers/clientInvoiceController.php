<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;


class clientInvoiceController extends Controller
{
    public function showInvoices()
{
    $invoices = Invoice::where('client_id', auth()->id())->orderBy('date', 'desc')->get();
    return view('viewInvoices', compact('invoices'));
}

}
