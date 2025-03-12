<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HizmetController;

// Public routes
Route::middleware('web')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::get('/hizmet', [HizmetController::class, 'index'])->name('hizmet');
    Route::get('/ekip', [HizmetController::class, 'ekip'])->name('ekip');

    // Authentication routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    });

    // User routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        // User appointment routes
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/', [AppointmentController::class, 'index'])->name('index');
            Route::get('/create', [AppointmentController::class, 'create'])->name('create');
            Route::post('/', [AppointmentController::class, 'store'])->name('store');
            Route::get('/{id}', [AppointmentController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AppointmentController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AppointmentController::class, 'update'])->name('update');
            Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('destroy');
        });
    });

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Guest admin routes
        Route::middleware('guest')->group(function () {
            Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
            Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
        });
        
        // Protected admin routes
        Route::middleware('admin')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
            
            // Admin appointment management
            Route::prefix('appointments')->name('appointments.')->group(function () {
                Route::get('/', [AdminController::class, 'appointments'])->name('index');
                Route::get('/{id}/edit', [AdminController::class, 'editAppointment'])->name('edit');
                Route::put('/{id}', [AdminController::class, 'updateAppointment'])->name('update');
                Route::delete('/{id}', [AdminController::class, 'destroyAppointment'])->name('destroy');
            });
        });
    });
});
