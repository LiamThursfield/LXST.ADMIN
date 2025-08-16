<?php

namespace App\Facades;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Facades\Tenancy as StanclTenancy;

class Tenancy extends StanclTenancy
{
    /**
     * All landlord route names will be prefixed with this value
     */
    public const string LANDLORD_ROUTE_NAME_PREFIX = 'landlord.';

    /**
     * All tenant route names will be prefixed with this value
     */
    public const string TENANT_ROUTE_NAME_PREFIX = 'tenant.';

    /**
     * Returns true if the app is currently in the 'tenant' context
     * i.e. there is an active tenant.
     * Otherwise, returns false, implying the app is in the 'landlord' context
     *
     * @return bool
     */
    public static function isTenant(): bool
    {
        return tenant() !== null;
    }

    /**
     * Returns true if the app is currently in the 'landlord' context
     * i.e. there is not an active tenant.
     * Otherwise, returns false, implying the app is in the 'tenant' context
     *
     * @return bool
     */
    public static function isLandlord(): bool
    {
        return tenant() === null;
    }

    /**
     * Returns true if the route(s) exist based on the current tenancy context
     *
     * Route names should be passed in without the tenant/landlord prefix,
     * as the prefix will be added based on the current tenancy context
     *
     * @param string|array<string> $name
     * @return bool
     */
    public static function routeHas(string|array $name): bool
    {
        $name = Arr::wrap($name);

        $prefix = self::isTenant() ? self::TENANT_ROUTE_NAME_PREFIX : self::LANDLORD_ROUTE_NAME_PREFIX;
        foreach ($name as $index => $item) {
            $name[$index] = $prefix.$item;
        }

        return Route::has($name);
    }
}
