<template>
    <reset-password-form :email="email" :token="token"/>
</template>

<script setup lang="ts">
import AuthLayout from "@/central/js/layouts/AuthLayout.vue";
import ResetPasswordForm from "@/core/js/components/auth/forms/ResetPasswordForm.vue";

defineOptions({
    layout: AuthLayout
});

defineProps<{
    email: string | null
    token: string | null
}>();
</script>
