<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import ProgressBar from 'primevue/progressbar';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
    </Head>
    <div class="flex h-screen w-full items-center justify-center bg-black text-white">
        <div>
            <h1 class="font-serif text-2xl font-bold tracking-widest lg:text-5xl">LXST.ADMIN</h1>
            <ProgressBar mode="indeterminate" class="mt-1 !h-2"></ProgressBar>
        </div>
    </div>
</template>
