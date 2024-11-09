<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/templateEmple', function () {
    return view('layouts.templateEmple');
});

Route::get('/home_client', function () {
    return view('home_client');
})->name('home_client');



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


Route::get('/vendor/add-pet', function () {
    return view('pets.add'); 
})->name('vendor.addPet');


Route::get('/vendor/view-pets', function () {
    return view('pets.view'); 
})->name('vendor.viewsPet');


Route::get('/vendor/issue-invoice', function () {
    return view('invoices.issue'); 
})->name('vendor.issueInvoice');


Route::get('/vendor/view-invoices', function () {
    return view('invoices.view'); 
})->name('vendor.viewsInvoice');


Route::get('/vendor/seller-profile', function () {
    return view('profile.seller'); 
})->name('vendor.sellerProfile');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // 
})->name('logout');


require __DIR__.'/auth.php';

