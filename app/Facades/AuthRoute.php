<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\AuthRoute as AuthRouteService;

/**
 * @method static void route(bool $register = false, bool $forgotPassword = false, bool $verifyEmail = false, bool $confirmPassword = false)
 *
 * @see \App\Services\AuthRoute
 */
class AuthRoute extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return AuthRouteService::class;
    }
}
