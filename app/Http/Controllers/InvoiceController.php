<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Diagnosis;
use App\Models\Pet;

class InvoiceController extends Controller
{
    public function viewAddInvoice(){
        $users = User::where('usertype', 'user')->get();
        $diagnostics = Diagnosis::all();
    
        return view('vendor.IssueInvoice', compact('users', 'diagnostics'));
    }
    public function viewInvoice()
{
    $users = User::where('usertype', 'user')->get();
    return view('vendor.viewsInvoice', compact('users'));
}

    // public function createForm()
    // {
    //     $users = User::where('usertype', 'user')->get();
    //     return view('vendor.issueInvoice', compact('users'));
    // }

    public function getDiagnostics(Request $request)
    {
        $pets = Pet::where('client_id', $request->client_id)->get();
        $diagnostics = Diagnosis::whereIn('pet_id', $pets->pluck('id'))->get();
        return response()->json($diagnostics);
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'diagnosis_id' => 'required|exists:diagnosis,id',
        'date' => 'required|date',
    ]);
    $clientId = $validatedData['user_id'];
    $diagnosisId = $validatedData['diagnosis_id'];
    $date = $validatedData['date'];
    $invoice = Invoice::create([
        'client_id' => $clientId,
        'diagnosis_id' => $diagnosisId,
        'date' => $date,
        'status' => 'impaga',
        'employee_id' => auth()->id(),
    ]);

    return redirect()->route('vendor.issueInvoice')
        ->with('success', 'Factura emitida correctamente.');
}

public function getInvoices(Request $request)
{
    $users = User::where('usertype', 'user')->get();
    $invoices = [];
    if ($request->has('client_id') && $request->input('client_id') !== null) {
        $invoices = Invoice::where('client_id', $request->input('client_id'))->get();
    }
    return view('vendor.viewsInvoice', compact('users', 'invoices'));
}


public function show($id)
{
    $invoice = Invoice::findOrFail($id);
    return view('vendor.showInvoice', compact('invoice'));
}

public function edit($id)
{
    $invoice = Invoice::findOrFail($id);
    $pets = Pet::where('client_id', $invoice->client_id)->pluck('id');
    $diagnostics = Diagnosis::whereIn('pet_id', $pets)->get();
    
    return view('vendor.editInvoice', compact('invoice', 'diagnostics'));
}


public function destroy($id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->delete();
    return redirect()->route('vendor.viewsInvoice')->with('success', 'Factura eliminada correctamente.');
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'diagnosis_id' => 'required|exists:diagnosis,id',
        'date' => 'required|date',
        'status' => 'required|in:impaga,pagada,cancelada',
    ]);

    $invoice = Invoice::findOrFail($id);
    $invoice->update([
        'diagnosis_id' => $validatedData['diagnosis_id'],
        'date' => $validatedData['date'],
        'status' => $validatedData['status'],
    ]);

    return redirect()->route('vendor.viewInvoice', $invoice->id)
        ->with('success', 'Factura actualizada correctamente.');
}


    


}



