<template>
    <div class="flex flex-col max-w-md space-y-3 w-full">
        <Card>
            <template #title>
                <h1 class="text-center">{{ title }}</h1>
            </template>

            <template #content>
                <div class="mt-4">
                    <slot />
                </div>
            </template>
        </Card>

        <div>
            <slot name="footer"/>
        </div>
    </div>
</template>

<script setup lang="ts">
import {Card} from "primevue";

defineProps<{
    title: string
}>();
</script>
