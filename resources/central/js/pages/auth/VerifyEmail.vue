<template>
    <verify-email-form :status="status"/>
</template>


<script setup lang="ts">
import AuthLayout from "@/central/js/layouts/AuthLayout.vue";
import VerifyEmailForm from "@/core/js/components/auth/forms/VerifyEmailForm.vue";

defineOptions({
    layout: AuthLayout
});

defineProps<{
    status: string | null
}>();
</script>
