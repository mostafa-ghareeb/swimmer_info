<?php

use App\Http\Controllers\HealthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportDataController;
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
    Route::put('/swimmer/update/{swimmer}', [SwimmerController::class, 'update'])->name('swimmers.update');
    Route::get('/swimmer/edit/{swimmer}', [SwimmerController::class, 'edit'])->name('swimmers.edit');
    Route::post('/swimmer/store', [SwimmerController::class, 'store'])->name('swimmers.store');
    Route::get('/swimmer/view/{swimmer}', [SwimmerController::class, 'view'])->name('swimmers.view');
    Route::delete('/swimmer/delete/{swimmer}', [SwimmerController::class, 'delete'])->name('swimmers.delete');
    
    Route::get('/swimmer/health/view/{swimmer}', [HealthController::class, 'view'])->name('swimmers.health.view');
    Route::get('/swimmer/health/create/{swimmer}', [HealthController::class, 'create'])->name('swimmers.health.create');
    Route::post('/swimmer/health/store/{swimmer}', [HealthController::class, 'store'])->name('swimmers.health.store');
    Route::get('/swimmer/health/edit/{health}', [HealthController::class, 'edit'])->name('swimmers.health.edit');
    Route::put('/swimmer/health/edit/{health}', [HealthController::class, 'update'])->name('swimmers.health.update');
    Route::delete('/swimmer/health/delete/{healthCondition}', [HealthController::class, 'delete'])->name('swimmers.health.delete');
    

    Route::get('/swimmer/sport/data/view/{swimmer}',[SportDataController::class , 'view'])->name('swimmers.sport.data.view');
    Route::get('/swimmer/sport/data/create/{swimmer}',[SportDataController::class , 'create'])->name('swimmers.sport.data.create');
    Route::post('/swimmer/sport/data/store/{swimmer}',[SportDataController::class , 'store'])->name('swimmers.sport.data.store');
});



require __DIR__.'/auth.php';
