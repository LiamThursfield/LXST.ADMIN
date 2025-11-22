<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Tenancy;
use App\Http\Controllers\Controller;
use App\Models\Central\User as CentralUser;
use App\Models\Tenant\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $userClass = Tenancy::isTenant() ? User::class : CentralUser::class;

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.$userClass,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = call_user_func(
            $userClass.'::create',
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        event(new Registered($user));

        Auth::guard(Tenancy::webGuard())->login($user);

        return to_route(Tenancy::routeName('admin'));
    }
}
