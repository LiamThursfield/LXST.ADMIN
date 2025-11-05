import {computed} from "vue";
import { usePage } from '@inertiajs/vue3'
import {AppPageProps} from "@/core/js/types";

export function useTenant() {
    const page = usePage<AppPageProps>();

    const tenant = computed(() => page.props.tenant ?? null);

    const isTenant = computed(() => tenant.value !== null);

    const tenantName = computed(() => isTenant.value ? tenant.value!.name : null);

    return {
        isTenant,
        tenant,
        tenantName,
    }
}
