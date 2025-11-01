<template>
    <auth-card
        title="Welcome Back"
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

            <div class="flex items-center gap-2">
                <Checkbox
                    inputId="remember"
                    binary
                    v-model="form.remember"
                />
                <label for="remember" class="cursor-pointer">Remember me</label>
            </div>

            <div class="flex items-center justify-between gap-2">
                <Button
                    label="Sign In"
                    type="submit"
                />

                <Button v-if="passwordRequestRouteExists()" asChild variant="link" >
                    <Link :href="getPasswordRequestRoute() as string" >Forgot Password?</Link>
                </Button>
            </div>
        </form>
    </auth-card>
</template>

<script setup lang="ts">

import {Button, Checkbox, InputText, Message} from "primevue";
import AuthCard from "@/core/js/components/auth/AuthCard.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {useAuthRoutes} from "@/core/js/composables";

const { getLoginStoreRoute, getPasswordRequestRoute, passwordRequestRouteExists } = useAuthRoutes();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});


const submit = () => {
    form.post(getLoginStoreRoute() as string);
};
</script>
