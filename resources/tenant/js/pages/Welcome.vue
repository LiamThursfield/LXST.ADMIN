<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import ProgressBar from 'primevue/progressbar';
import { computed } from 'vue';

const page = usePage();

const tenantName = computed(() => page.props.tenant);
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
    </Head>
    <div class="flex h-screen w-full items-center justify-center bg-black text-white">
        <div class="text-center">
            <h1 class="font-serif text-2xl font-bold tracking-widest lg:text-5xl">LXST.ADMIN</h1>
            <ProgressBar mode="indeterminate" class="mt-1 !h-2"></ProgressBar>
            <h1 class="text-primary-400 mt-1 font-serif text-xl font-bold tracking-widest lg:text-3xl">Tenant: {{ tenantName }}</h1>
        </div>
    </div>
</template>
