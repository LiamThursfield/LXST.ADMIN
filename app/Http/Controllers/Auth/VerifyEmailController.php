<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Tenancy;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $redirectUrl = route(Tenancy::routeName('admin'), absolute: false).'?verified=1';

        if ($request->user()?->hasVerifiedEmail()) {
            return redirect()->intended($redirectUrl);
        }

        $request->fulfill();

        return redirect()->intended($redirectUrl);
    }
}
