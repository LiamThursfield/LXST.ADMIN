<template>
    <auth-card
        title="Create Your Account"
    >
        <form
            class="flex flex-col space-y-6 w-full"
            @submit.prevent="submit"
        >

            <div class="flex flex-col space-y-2">
                <label for="email" class="pl-1">Email</label>
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

            <div class="flex flex-col space-y-2">
                <label for="first_name" class="pl-1">First Name</label>
                <InputText
                    id="first_name"
                    name="first_name"
                    class="w-full"
                    required
                    v-model="form.first_name"
                />
                <Message
                    v-if="form.errors.hasOwnProperty('first_name')"
                    severity="error"
                    size="small"
                    variant="simple"
                >
                    {{ form.errors.first_name }}
                </Message>
            </div>

            <div class="flex flex-col space-y-2">
                <label for="last_name" class="pl-1">Last Name</label>
                <InputText
                    id="last_name"
                    name="last_name"
                    class="w-full"
                    required
                    v-model="form.last_name"
                />
                <Message
                    v-if="form.errors.hasOwnProperty('last_name')"
                    severity="error"
                    size="small"
                    variant="simple"
                >
                    {{ form.errors.last_name }}
                </Message>
            </div>

            <div class="flex flex-col space-y-2">
                <label for="password" class="pl=1">Password</label>
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
                    label="Create Account"
                    type="submit"
                />

                <Button asChild variant="link" >
                    <Link :href="getLoginRoute() as string" >Return to sign in</Link>
                </Button>
            </div>
        </form>
    </auth-card>
</template>

<script setup lang="ts">

import {Button, InputText, Message} from "primevue";
import AuthCard from "@/core/js/components/auth/AuthCard.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {useAuthRoutes} from "@/core/js/composables";

const { getRegisterStoreRoute, getLoginRoute } = useAuthRoutes();

const form = useForm({
    email: '',
    first_name: '',
    last_name: '',
    password: '',
    password_confirmation: '',
});


const submit = () => {
    form.post(getRegisterStoreRoute() as string);
};
</script>
