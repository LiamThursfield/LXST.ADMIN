<?php

namespace App\Facades;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Facades\Tenancy as StanclTenancy;

class Tenancy extends StanclTenancy
{
    /**
     * All central route names will be prefixed with this value
     */
    public const string CENTRAL_ROUTE_NAME_PREFIX = 'central.';

    /**
     * All tenant route names will be prefixed with this value
     */
    public const string TENANT_ROUTE_NAME_PREFIX = '';

    /**
     * Returns true if the app is currently in the 'tenant' context
     * i.e. there is an active tenant.
     * Otherwise, returns false, implying the app is in the 'central' context
     *
     * @return bool
     */
    public static function isTenant(): bool
    {
        return tenant() !== null;
    }

    /**
     * Returns true if the app is currently in the 'central' context
     * i.e. there is not an active tenant.
     * Otherwise, returns false, implying the app is in the 'tenant' context
     *
     * @return bool
     */
    public static function isCentral(): bool
    {
        return tenant() === null;
    }

    /**
     * Returns true if the route(s) exist based on the current tenancy context
     *
     * Route names should be passed in without the tenant/central prefix,
     * as the prefix will be added based on the current tenancy context
     *
     * @param string|array<string> $name
     * @return bool
     */
    public static function routeHas(string|array $name): bool
    {
        $name = Arr::wrap($name);

        $prefix = self::isTenant() ? self::TENANT_ROUTE_NAME_PREFIX : self::CENTRAL_ROUTE_NAME_PREFIX;
        foreach ($name as $index => $item) {
            $name[$index] = $prefix.$item;
        }

        return Route::has($name);
    }
}
