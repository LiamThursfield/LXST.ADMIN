<script setup lang="ts">
import {computed, Ref, ref, watch} from 'vue';
import {useLayout} from "@/core/js/layouts/admin/composables/layout";
import AppTopbar from "@/core/js/layouts/admin/AppTopbar.vue";
import AppSidebar from "@/core/js/layouts/admin/AppSidebar.vue";
import Toast from 'primevue/toast';

const { layoutConfig, layoutState, isSidebarActive } = useLayout();

const outsideClickListener: Ref<null | EventListenerOrEventListenerObject> = ref(null);

watch(isSidebarActive, (newVal) => {
    if (newVal) {
        bindOutsideClickListener();
    } else {
        unbindOutsideClickListener();
    }
});

const containerClass = computed(() => {
    return {
        'layout-overlay': layoutConfig.menuMode === 'overlay',
        'layout-static': layoutConfig.menuMode === 'static',
        'layout-static-inactive': layoutState.staticMenuDesktopInactive && layoutConfig.menuMode === 'static',
        'layout-overlay-active': layoutState.overlayMenuActive,
        'layout-mobile-active': layoutState.staticMenuMobileActive
    };
});

function bindOutsideClickListener() {
    if (!outsideClickListener.value) {
        outsideClickListener.value = (event: any) => {
            if (isOutsideClicked(event)) {
                layoutState.overlayMenuActive = false;
                layoutState.staticMenuMobileActive = false;
                layoutState.menuHoverActive = false;
            }
        };
        document.addEventListener('click', outsideClickListener.value);
    }
}

function unbindOutsideClickListener() {
    if (outsideClickListener.value !== null && outsideClickListener.value as EventListenerOrEventListenerObject) {
        document.removeEventListener('click', outsideClickListener.value);
        outsideClickListener.value = null;
    }
}

function isOutsideClicked(event: any) {
    const sidebarEl = document.querySelector('.layout-sidebar');
    const topbarEl = document.querySelector('.layout-menu-button');
    if (sidebarEl === null || topbarEl === null) {
        return false;
    }

    return !(sidebarEl.isSameNode(event.target) || sidebarEl.contains(event.target) || topbarEl.isSameNode(event.target) || topbarEl.contains(event.target));
}
</script>

<template>
    <div class="layout-wrapper" :class="containerClass">
        <app-topbar></app-topbar>
        <app-sidebar></app-sidebar>
        <div class="layout-main-container">
            <div class="layout-main">
                <slot />
            </div>
<!--            <app-footer></app-footer>-->
        </div>

        <div class="layout-mask animate-fadein"></div>
    </div>

    <Toast />
</template>
