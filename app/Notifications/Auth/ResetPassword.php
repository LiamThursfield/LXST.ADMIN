<?php

namespace App\Notifications\Auth;

use App\Facades\Tenancy;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Foundation\Application;
use Illuminate\Notifications\Notifiable;

class ResetPassword extends \Illuminate\Auth\Notifications\ResetPassword
{
    /**
     * Where to redirect users after reset.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected function resetUrl(mixed $notifiable): UrlGenerator|Application|string
    {
        /** @param Notifiable $notifiable */

        return url(route(Tenancy::routeName('password.reset'), [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}
