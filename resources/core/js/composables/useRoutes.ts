import {route} from "ziggy-js";
import {useTenant} from "@/core/js/composables/useTenant";

export function useRoutes() {
    const {isTenant} = useTenant();

    /**
     * Resolve the route name based on tenant context
     * @param name
     */
    const resolveRouteName = (name: string): string | null => {
        // If there is not a tenant, check for central routes
        if (!isTenant.value) {
            const centralName = `central.${name}`;
            if (route().has(centralName)) {
                return centralName;
            }

            return null;
        }

        if (route().has(name)) {
            return name;
        }

        return null;
    };

    return {
        resolveRouteName
    }
}
