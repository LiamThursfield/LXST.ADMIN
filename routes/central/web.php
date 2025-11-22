<?php

use App\Facades\AuthRoute;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

AuthRoute::route(
    register: true,
    forgotPassword: true,
    verifyEmail: true,
    confirmPassword: true,
    authMiddleware: 'auth:central-web',
);

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->middleware(['auth:central-web', 'verified:central.verification.notice'])->name('dashboard');

Route::get('/', function () {
    return Inertia::render('Welcome', []);
})->name('home');
