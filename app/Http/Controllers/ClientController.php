<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __invoke()
    {
        return view('home_client');
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('clientProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->direccion = $request->input('direccion');

        $user->save();


        return redirect()->route('clientProfile')->with('success', 'Perfil actualizado exitosamente');
    }

    public function markAsPaid($id)
    {
        $invoice = Invoice::findOrFail($id);

        //if ($invoice->status === 'Paid') {
            //return redirect()->back()->with('error', 'La factura ya está marcada como pagada.');
        //}

        $invoice->status = 'Paid';
        $invoice->save();

        return redirect()->route('viewInvoices')->with('success', 'La factura ha sido abonada');
    }

    public function showInvoices()
    {
        $invoices = Invoice::where('client_id', auth()->id())->orderBy('date', 'desc')->get();
        return view('viewInvoices', compact('invoices'));
    }
}
