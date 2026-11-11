<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/penghuni', [PenghuniController::class, 'index'])->name('penghuni.index');
    Route::get('/penghuni/create', [PenghuniController::class, 'create'])->name('penghuni.create');
    Route::post('/penghuni', [PenghuniController::class, 'store'])->name('penghuni.store');
    Route::get('/penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::put('/penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/penghuni/{id}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/penghuni');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
});

Route::get('/', function () {
    return view('welcome');
});