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
        return view('vendor.IssueInvoice');

    }
    public function viewInvoice(){
        return view('vendor.viewsInvoice');

    }

    public function createForm()
    {
        $users = User::where('usertype', 'user')->get();
        return view('vendor.issueInvoice', compact('users'));
    }

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
    


}



