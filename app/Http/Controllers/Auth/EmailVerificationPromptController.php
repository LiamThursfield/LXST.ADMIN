<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Tenancy;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPromptController extends Controller
{
    /**
     * Show the email verification prompt page.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return ($request->user()?->hasVerifiedEmail() ?? false)
                    ? redirect()->intended(route(Tenancy::routeName('admin'), absolute: false))
                    : Inertia::render('auth/VerifyEmail', ['status' => $request->session()->get('status')]);
    }
}
