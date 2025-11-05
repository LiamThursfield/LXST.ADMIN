<script setup lang="ts">
import AuthLayout from "@/core/js/layouts/auth/AuthLayout.vue";
import ResetPasswordForm from "@/core/js/components/auth/forms/ResetPasswordForm.vue";

defineOptions({
    layout: AuthLayout
});

defineProps<{
    email: string | null
    token: string | null
}>();
</script>

<template>
    <reset-password-form :email="email" :token="token"/>
</template>
