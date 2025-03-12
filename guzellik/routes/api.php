<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Burada API için yönlendirmeleri tanımlayabilirsin. Laravel'in varsayılan
| API yönlendirme grubu "api" öneki ile başlar. Middleware kullanabilirsin.
|
*/

// Basit bir test endpoint'i
Route::get('/test', function () {
    return response()->json(['message' => 'API Çalışıyor!']);
});

// Kullanıcı bilgisini almak için örnek bir endpoint
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Randevu için API endpoint'leri
Route::apiResource('randevular', RandevuController::class);

