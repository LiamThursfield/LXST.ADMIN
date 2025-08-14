<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromUnwantedDomains;
use Stancl\Tenancy\Middleware\ScopeSessions;

function buildLandlordRoutes(string|array $middleware, string $as, string $path, string $prefix = ''): void
{
    foreach (config('tenancy.identification.central_domains') as $index => $domain) {
        // Add the index to the route name if there is more than one central domain
        // Otherwise we cannot cache routes - the first domain should not include a number
        $computedAs = ($index > 0) ? $as.'.'.$index.'.' : $as.'.';

        Route::middleware($middleware)
            ->domain($domain)
            ->as($computedAs)
            ->prefix($prefix)
            ->group(base_path($path));
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            buildLandlordRoutes(
                'landlord-web',
                'landlord',
                'routes/landlord/web.php'
            );

            Route::middleware(['tenant-web'])
                ->as('tenant.')
                ->group(base_path('routes/tenant/web.php'));
        },
        commands: __DIR__.'/../routes/console.php',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Append the inertia middleware to the web group
        $middleware->web(append: [
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);

        // Get the web and api groups, as we will be using those for tenant/landlord groups
        $groups = $middleware->getMiddlewareGroups();
        $webMiddle = $groups['web'];
        $apiGroup = $groups['api'];

        // Define the landlord middleware groups
        $middleware->group('landlord-web', $webMiddle);

        // Define the tenant middleware groups

        $tenantMiddleware = [
            InitializeTenancyByDomain::class,
            PreventAccessFromUnwantedDomains::class,
            ScopeSessions::class,
        ];

        $middleware->group('tenant-web', array_merge($webMiddle, $tenantMiddleware));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
