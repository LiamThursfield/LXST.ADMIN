import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    app: {
        name: string;
        current_route_name: null|string,
        menu_items: Array<MenuItem|MenuSeparator>
    }
    auth: Auth;
    status: ?string
    ziggy: Config & { location: string };
    tenant: ?Tenant
};

export interface User {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Tenant {
    id: string;
    name: string;
    data: null | any;
}

export interface MenuItem {
    class?: string|null;
    label: string;
    icon?: string|null;
    route_name?: string|null;
    target?: string|null;
    url?: string;

    items?: Array<MenuItem>|null;
}
