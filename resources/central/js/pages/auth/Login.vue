<template>
    <login-form />
</template>


<script setup lang="ts">
import AuthLayout from "@/central/js/layouts/AuthLayout.vue";
import LoginForm from "@/core/js/components/auth/forms/LoginForm.vue";

defineOptions({
    layout: AuthLayout
});

defineProps<{
    status: string | null
}>();
</script>
