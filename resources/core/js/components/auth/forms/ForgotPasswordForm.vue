<template>
    <auth-card
        title="Forgot Password"
    >
        <div
            v-if="status !== null && status.length > 0"
            class="flex flex-col items-center justify-center space-y-4"
        >
            <Message
                class="text-center w-full"
                severity="contrast"
                variant="simple"
            >
                {{ status }}
            </Message>

            <Button asChild variant="link">
                <Link :href="getLoginRoute() as string" class="text-primary">Return to sign in</Link>
            </Button>
        </div>

        <form
            v-else
            class="flex flex-col space-y-6 w-full"
            @submit.prevent="submit"
        >
            <div class="flex flex-col space-y-2">
                <label class="pl-1" for="email">Email</label>
                <InputText
                    id="email"
                    name="email"
                    class="w-full"
                    required
                    type="email"
                    v-model="form.email"
                />
                <Message
                    v-if="form.errors.hasOwnProperty('email')"
                    severity="error"
                    size="small"
                    variant="simple"
                >
                    {{ form.errors.email }}
                </Message>
            </div>

            <div class="flex items-center justify-between gap-2">
                <Button
                    label="Continue"
                    type="submit"
                />

                <Button asChild variant="link" >
                    <Link :href="getLoginRoute() as string" >Return to sign in</Link>
                </Button>
            </div>

            <register-panel />
        </form>
    </auth-card>
</template>

<script lang="ts" setup>

import {Button, InputText, Message} from "primevue";
import AuthCard from "@/core/js/components/auth/AuthCard.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {useAuthRoutes} from "@/core/js/composables";
import RegisterPanel from "@/core/js/components/auth/panels/RegisterPanel.vue";

const { getLoginRoute } = useAuthRoutes();

defineProps<{
    status: string | null
}>();


const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('central.password.request'));
};
</script>
