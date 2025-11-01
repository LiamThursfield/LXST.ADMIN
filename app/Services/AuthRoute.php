<?php

namespace App\Services;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

class AuthRoute
{
    /**
     * Registers the desired authentication routes
     *
     * @param  string  $authMiddleware  - should be overridden if you want to use a different auth middleware or apply a different guard
     */
    public function route(
        bool $register = false,
        bool $forgotPassword = false,
        bool $verifyEmail = false,
        bool $confirmPassword = false,
        string $authMiddleware = 'auth',
    ): void {
        Route::middleware('guest')->group(function () use ($register, $forgotPassword) {
            // Always register the login route, otherwise there is no reason to use this service
            Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

            Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->name('login.store');

            if ($register) {
                Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');

                Route::post('register', [RegisteredUserController::class, 'store'])
                    ->name('register.store');
            }

            if ($forgotPassword) {
                Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->name('password.request');

                Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->name('password.email');

                Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('password.reset');

                Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('password.store');
            }
        });

        Route::middleware($authMiddleware)->group(function () use ($verifyEmail, $confirmPassword) {
            // Always register the logout route, otherwise there is no reason to use this service
            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
            Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

            if ($verifyEmail) {
                Route::get('verify-email', EmailVerificationPromptController::class)
                    ->name('verification.notice');

                Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                    ->middleware(['signed', 'throttle:6,1'])
                    ->name('verification.verify');

                Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware('throttle:6,1')
                    ->name('verification.send');
            }

            if ($confirmPassword) {
                Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->name('password.confirm');

                Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
                    ->middleware('throttle:6,1');
            }
        });
    }
}
