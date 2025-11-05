<script setup lang="ts">
import AuthLayout from "@/core/js/layouts/auth/AuthLayout.vue";
import VerifyEmailForm from "@/core/js/components/auth/forms/VerifyEmailForm.vue";

defineOptions({
    layout: AuthLayout
});

defineProps<{
    status: string | null
}>();
</script>

<template>
    <verify-email-form :status="status"/>
</template>
