<script setup lang="ts">
import AuthLayout from "@/core/js/layouts/auth/AuthLayout.vue";
import RegisterForm from "@/core/js/components/auth/forms/RegisterForm.vue";

defineOptions({
    layout: AuthLayout
});
</script>

<template>
    <register-form />
</template>
