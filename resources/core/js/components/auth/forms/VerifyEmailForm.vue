<template>
    <auth-card
        title="Verify Your Email"
    >
        <div class="flex flex-col space-y-6 w-full">
            <p>
                If you did not receive the email
                <Link
                    class="cursor-pointer inline text-primary-600 hover:underline"
                    :href="getVerificationSendRoute() as string"
                    method="post"
                >
                    click here
                </Link>
                to request another.
            </p>

            <div
                v-if="hasResentVerification"
                class="bg-primary-100 flex flex-row justify-center px-4 py-3 rounded-lg text-sm"
            >
                <p>
                    A fresh verification link has been sent to your email address.
                </p>
            </div>
        </div>


        <template #footer>
            <Link
                class="cursor-pointer inline text-white hover:text-primary-600"
                :href="getLogoutRoute() as string"
                method="post"
            >
                Logout
            </Link>
        </template>
    </auth-card>

</template>

<script setup lang="ts">

import AuthCard from "@/core/js/components/auth/AuthCard.vue";
import { Link } from '@inertiajs/vue3'
import {useAuthRoutes} from "@/core/js/composables";
import {computed} from "vue";

const { getLogoutRoute, getVerificationSendRoute } = useAuthRoutes();

const props = defineProps<{
    status: string | null
}>();

const hasResentVerification = computed(() => props.status === 'verification-link-sent');

</script>
