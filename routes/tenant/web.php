<?php

declare(strict_types=1);

use App\Facades\AuthRoute;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
AuthRoute::route(
    register: true,
    forgotPassword: true,
    verifyEmail: true,
    confirmPassword: true,
);

Route::get('/dashboard', function () {
    return [];
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'tenant' => fn () => tenant('name'),
    ]);
})->name('home');
