<template>
    <register-form />
</template>


<script setup lang="ts">
import AuthLayout from "@/central/js/layouts/AuthLayout.vue";
import RegisterForm from "@/core/js/components/auth/forms/RegisterForm.vue";

defineOptions({
    layout: AuthLayout
});
</script>
