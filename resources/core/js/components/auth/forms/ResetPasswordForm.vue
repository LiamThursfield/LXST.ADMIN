<template>
    <auth-card
        title="Reset Your Password"
    >
        <form
            class="flex flex-col space-y-6 w-full"
            @submit.prevent="submit"
        >
            <div class="flex flex-col space-y-2">
                <label for="password" class="pl=1">New Password</label>
                <InputText
                    id="password"
                    name="password"
                    class="w-full"
                    required
                    type="password"
                    v-model="form.password"
                />
                <Message
                    v-if="form.errors.hasOwnProperty('password')"
                    severity="error"
                    size="small"
                    variant="simple"
                >
                    {{ form.errors.password }}
                </Message>
            </div>

            <div class="flex flex-col space-y-2">
                <label for="password_confirmation" class="pl=1">Password Confirmation</label>
                <InputText
                    id="password_confirmation"
                    name="password_confirmation"
                    class="w-full"
                    required
                    type="password"
                    v-model="form.password_confirmation"
                />
                <Message
                    v-if="form.errors.hasOwnProperty('password_confirmation')"
                    severity="error"
                    size="small"
                    variant="simple"
                >
                    {{ form.errors.password_confirmation }}
                </Message>
            </div>

            <div class="flex items-center justify-between gap-2">
                <Button
                    label="Reset Password"
                    type="submit"
                />
            </div>
        </form>
    </auth-card>
</template>

<script setup lang="ts">
import AuthCard from "@/core/js/components/auth/AuthCard.vue";
import {useForm} from "@inertiajs/vue3";
import {Button, InputText, Message} from "primevue";
import {useAuthRoutes} from "@/core/js/composables";

const { getPasswordStoreRoute } = useAuthRoutes();

const props = defineProps<{
    email: string | null
    token: string | null
}>();

const form = useForm({
    email: props.email ?? '',
    password: '',
    password_confirmation: '',
    token: props.token ?? '',
})

const submit = () => {
    form.post(getPasswordStoreRoute() as string);
};
</script>
