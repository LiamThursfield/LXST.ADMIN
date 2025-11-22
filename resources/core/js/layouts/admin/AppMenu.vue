<script setup lang="ts">
import {computed} from 'vue';

import AppMenuItem from './AppMenuItem.vue';
import {usePage} from "@inertiajs/vue3";
import {AppPageProps, MenuItem} from "@/core/js/types";

const page = usePage<AppPageProps>();

const menu = computed(() => page.props.app.menu_items);

</script>

<template>
    <ul class="layout-menu">
        <template v-for="(item, i) in menu" :key="item">
            <app-menu-item
                :item="item as MenuItem"
                :index="i"
            />
        </template>
    </ul>
</template>

<style scoped>

</style>
