<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return redirect()->route('pasien.index');
});

Route::resource('pasien', PasienController::class);

Route::get('/health', function () {
    try {
        \DB::connection()->getPdo();
        return response()->json(['status' => 'ok', 'database' => 'connected'], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'database' => 'disconnected'], 500);
    }
});