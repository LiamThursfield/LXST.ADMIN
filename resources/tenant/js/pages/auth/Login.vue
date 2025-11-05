<script setup lang="ts">
import AuthLayout from "@/core/js/layouts/auth/AuthLayout.vue";
import LoginForm from "@/core/js/components/auth/forms/LoginForm.vue";

defineOptions({
    layout: AuthLayout
});

defineProps<{
    status: string | null
}>();
</script>

<template>
    <login-form :status="status" />
</template>
