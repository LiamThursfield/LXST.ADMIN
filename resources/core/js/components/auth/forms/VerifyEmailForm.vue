<script setup lang="ts">

import AuthCard from "@/core/js/components/auth/AuthCard.vue";
import { Link } from '@inertiajs/vue3'
import {useAuthRoutes} from "@/core/js/composables";
import {computed} from "vue";
import {Message} from "primevue";

const { getLogoutRoute, getVerificationSendRoute } = useAuthRoutes();

const props = defineProps<{
    status: string | null
}>();

const hasResentVerification = computed(() => props.status === 'verification-link-sent');

</script>

<template>
    <auth-card
        title="Verify Your Email"
    >
        <div class="flex flex-col items-center justify-center space-y-4">
            <Message
                class="text-center w-full"
                severity="contrast"
                variant="simple"
            >
                If you did not receive the email
                <Link
                    class="cursor-pointer inline text-primary-600 hover:underline"
                    :href="getVerificationSendRoute() as string"
                    method="post"
                >
                    click here
                </Link>
                to request another.
            </Message>

            <div
                v-if="hasResentVerification"
                class="bg-primary-100 flex flex-row justify-center px-4 py-3 rounded-lg text-sm"
            >
                <p class="text-center">
                    A fresh verification link has been sent to your email address.
                </p>
            </div>
        </div>


        <template #footer>
            <div class="px-3 text-right">
                <Link
                    class="cursor-pointer  text-white hover:text-primary-600"
                    :href="getLogoutRoute() as string"
                    method="post"
                >
                    Logout
                </Link>
            </div>
        </template>
    </auth-card>
</template>
