<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeVendorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MascVendedorController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\viewPetsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/dashboard', [HomeController::class, 'index']);

Route::get('/vendor/dashboard', [HomeVendorController::class, 'index'])->name('vendor.dashboard');

Route::get('/vendor/viewsPet', [MascVendedorController::class, 'viewPet'])->name('vendor.viewsPet');

Route::get('/vendor/issueInvoice', [InvoiceController::class, 'viewAddInvoice'])->name('vendor.issueInvoice');
Route::get('/vendor/viewsInvoice', [InvoiceController::class, 'viewInvoice'])->name('vendor.viewsInvoice');
Route::get('/vendor/sellerProfile', [PerfilUsuarioController::class, 'viewAddSeller'])->name('vendor.sellerProfile');


///MASCOTAS


Route::get('/vendor/addPet', [MascVendedorController::class, 'viewAddPet'])->name('vendor.addPet');

Route::get('/vendor/createPet', [MascVendedorController::class, 'viewCreatePet'])->name('vendor.createPet');

Route::post('/vendor/savePet', [viewPetsController::class, 'savePet'])->name('vendor.savePet');
Route::post('/vendor/viewsPet', [MascVendedorController::class, 'viewPet'])->name('vendor.viewsPet');
Route::get('/vendor/{id_registro}/editPet', [viewPetsController::class, 'edit'])->name('vendor.editPet');
Route::put('/vendor/updatePet', [viewPetsController::class, 'update'])->name('vendor.updatePet');
Route::delete('/vendor/{id_registro}/deletePet', [viewPetsController::class, 'destroy'])->name('vendor.deletePet');

///MASCOTAS 



require __DIR__ . '/auth.php';
