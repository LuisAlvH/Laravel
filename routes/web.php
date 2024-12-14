<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\DiagnosisSellerController;
use App\Http\Controllers\InvoiceSellerController;
use App\Http\Controllers\PetSellerController;
use App\Http\Controllers\ProfileSellerController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePasswordControllerSell;
use App\Http\Controllers\Auth\PasswordSellController;
use App\Http\Controllers\HomeSellerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/templateEmple', function () {
    return view('layouts.templateEmple');
});

Route::get('/clientProfile', [ClientController::class, 'showProfile'])->name('clientProfile');
Route::post('/clientProfile/update', [ClientController::class, 'updateProfile'])->name('clientProfile.updateProfile');
Route::get('/home_client', ClientController::class)->name('home_client');
Route::get('/viewPets', [PetSellerController::class, 'showPets'])->name('viewPets');
Route::get('/pets/{pet_id}/petDiagnosis', [DiagnosisSellerController::class, 'showDiagnosis'])->name('petDiagnosis');
Route::get('/viewInvoices', [ClientController::class, 'showInvoices'])->name('viewInvoices');
Route::patch('/invoices/{id}/mark-paid', [ClientController::class, 'markAsPaid'])->name('invoices.markPaid');
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
Route::get('/vendor/issue-invoice', [InvoiceSellerController::class, 'viewAddInvoice'])->name('vendor.issueInvoice');
Route::get('/vendor/view-invoices', [InvoiceSellerController::class, 'viewInvoice'])->name('vendor.viewsInvoice');
Route::post('/vendor/save-invoice', [InvoiceSellerController::class, 'store'])->name('saveIssue');
Route::get('/get-diagnostics', [InvoiceSellerController::class, 'getDiagnostics'])->name('getDiagnostics');
Route::get('/vendor/get-invoices', [InvoiceSellerController::class, 'getInvoices'])->name('vendor.getInvoices');
Route::get('/vendor/invoice/{id}', [InvoiceSellerController::class, 'show'])->name('vendor.viewInvoice');
Route::get('/vendor/invoice/{id}/edit', [InvoiceSellerController::class, 'edit'])->name('vendor.editInvoice');
Route::put('/vendor/invoice/{id}', [InvoiceSellerController::class, 'update'])->name('vendor.updateInvoice');
Route::delete('/vendor/invoice/{id}', [InvoiceSellerController::class, 'destroy'])->name('vendor.deleteInvoice');
Route::get('/vendor/sellerProfile', [ProfileSellerController::class, 'showProfile'])->name('vendor.sellerProfile');
Route::post('/vendor/sellerProfile', [ProfileSellerController::class, 'updateProfile'])->name('vendor.sellerProfile');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/admin/dashboard', [HomeAdminController::class, 'index']);
Route::get('/vendor/dashboard', [HomeSellerController::class, 'index'])->name('vendor.dashboard');
Route::get('/vendor/addPet', [PetSellerController::class, 'viewAddPet'])->name('vendor.addPet');
Route::get('/vendor/createPet', [PetSellerController::class, 'viewCreatePet'])->name('vendor.createPet');
Route::post('/vendor/savePet', [PetSellerController::class, 'savePet'])->name('vendor.savePet');
Route::match(['get', 'post'], '/vendor/view-pets', [PetSellerController::class, 'viewPet'])->name('vendor.viewsPet');
Route::get('/vendor/{id_registro}/editPet', [PetSellerController::class, 'edit'])->name('vendor.editPet');
Route::put('/vendor/updatePet', [PetSellerController::class, 'update'])->name('vendor.updatePet');
Route::delete('/vendor/{id_registro}/deletePet', [PetSellerController::class, 'destroy'])->name('vendor.deletePet');
require __DIR__ . '/auth.php';
