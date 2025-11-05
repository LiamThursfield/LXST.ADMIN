<script setup lang="ts">
import {Link} from "@inertiajs/vue3";
import {useAuthRoutes} from "@/core/js/composables";

const { registerRouteExists, getRegisterRoute } = useAuthRoutes();
</script>

<template>
    <div
        v-if="registerRouteExists()"
        class="bg-primary-100 flex flex-row justify-center px-4 py-3 rounded-lg"
    >
        Not registered?
        <Link
            :href="getRegisterRoute() as string"
            class="ml-1 text-primary-600 hover:underline"
        >
            Create account
        </Link>
    </div>
</template>
