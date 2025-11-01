<?php

namespace App\Providers;

use App\Facades\Tenancy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->defineVerifyEmailCallback();

        // Implicitly grant "Super" role all permissions
        Gate::before(function ($user, $ability) {
            return null;
            //          // TODO add role checks
            //            return (
            //                false
            //            ) ? true : null;
        });
    }

    protected function defineVerifyEmailCallback(): void
    {
        VerifyEmail::createUrlUsing(function ($notifiable) {
            return url(route(
                Tenancy::routeName('verification.verify'),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ], false));
        });
    }
}
