<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SwimmerController;
use App\Models\Swimmer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
        $swimmers = Swimmer::all();
        return view('swimmers.index', compact('swimmers'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/swimmers', [SwimmerController::class, 'index'])->name('swimmers.index');
    Route::get('/swimmer/create', [SwimmerController::class, 'create'])->name('swimmers.create');
    Route::post('/swimmer/store', [SwimmerController::class, 'store'])->name('swimmers.store');
    Route::get('/swimmer/view/{swimmer}', [SwimmerController::class, 'view'])->name('swimmers.view');
});



require __DIR__.'/auth.php';
