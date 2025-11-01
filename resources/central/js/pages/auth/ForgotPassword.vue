<template>
    <forgot-password-form :status="status" />
</template>


<script setup lang="ts">
import AuthLayout from "@/central/js/layouts/AuthLayout.vue";
import ForgotPasswordForm from "@/core/js/components/auth/forms/ForgotPasswordForm.vue";

defineOptions({
    layout: AuthLayout
})

defineProps<{
    status: string | null
}>();
</script>
