<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\viewPetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\diagnosisController;
use App\Http\Controllers\clientInvoiceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MascVendedorController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\HomeVendorController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePasswordControllerSell;

use App\Http\Controllers\Auth\PasswordSellController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/templateEmple', function () {
    return view('layouts.templateEmple');
});

Route::get('/clientProfile', [ClientController::class, 'showProfile'])->name('clientProfile');

Route::post('/clientProfile/update', [ClientController::class, 'updateProfile'])->name('clientProfile.updateProfile');

Route::get('/home_client', ClientController::class)->name('home_client');

Route::get('/viewPets', [viewPetsController::class, 'showPets'])->name('viewPets');

Route::get('/pets/{pet_id}/petDiagnosis', [DiagnosisController::class, 'showDiagnosis'])->name('petDiagnosis');

Route::get('/viewInvoices', [clientInvoiceController::class, 'showInvoices'])->name('viewInvoices');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/vendor/dashboard', function () {
    return view('vendor.dashboard');
})->name('vendor.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('change-password', ChangePasswordController::class)->name('passwordChange');
    Route::get('changePasswordSell', ChangePasswordControllerSell::class)->name('changePasswordSell');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::put('passwordSell', [PasswordSellController::class, 'update'])->name('passwordSell.update');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
});




Route::get('/vendor/issue-invoice', [InvoiceController::class, 'viewAddInvoice'])->name('vendor.issueInvoice');
Route::get('/vendor/view-invoices', [InvoiceController::class, 'viewInvoice'])->name('vendor.viewsInvoice');
Route::post('/vendor/save-invoice', [InvoiceController::class, 'store'])->name('saveIssue');
Route::get('/get-diagnostics', [InvoiceController::class, 'getDiagnostics'])->name('getDiagnostics');
Route::get('/vendor/get-invoices', [InvoiceController::class, 'getInvoices'])->name('vendor.getInvoices');
Route::get('/vendor/invoice/{id}', [InvoiceController::class, 'show'])->name('vendor.viewInvoice');
Route::get('/vendor/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('vendor.editInvoice');
Route::put('/vendor/invoice/{id}', [InvoiceController::class, 'update'])->name('vendor.updateInvoice');
Route::delete('/vendor/invoice/{id}', [InvoiceController::class, 'destroy'])->name('vendor.deleteInvoice');



Route::get('/vendor/sellerProfile', [PerfilUsuarioController::class, 'showProfile'])->name('vendor.sellerProfile');


Route::post('/vendor/sellerProfile', [PerfilUsuarioController::class, 'updateProfile'])->name('vendor.sellerProfile');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // 
})->name('logout');



require __DIR__ . '/auth.php';
Route::get('/admin/dashboard', [HomeController::class, 'index']);

Route::get('/vendor/dashboard', [HomeVendorController::class, 'index'])->name('vendor.dashboard');


///MASCOTAS





Route::get('/vendor/addPet', [MascVendedorController::class, 'viewAddPet'])->name('vendor.addPet');

Route::get('/vendor/createPet', [MascVendedorController::class, 'viewCreatePet'])->name('vendor.createPet');

Route::post('/vendor/savePet', [viewPetsController::class, 'savePet'])->name('vendor.savePet');
Route::match(['get', 'post'], '/vendor/view-pets', [MascVendedorController::class, 'viewPet'])->name('vendor.viewsPet');
Route::get('/vendor/{id_registro}/editPet', [viewPetsController::class, 'edit'])->name('vendor.editPet');
Route::put('/vendor/updatePet', [viewPetsController::class, 'update'])->name('vendor.updatePet');
Route::delete('/vendor/{id_registro}/deletePet', [viewPetsController::class, 'destroy'])->name('vendor.deletePet');





require __DIR__ . '/auth.php';
