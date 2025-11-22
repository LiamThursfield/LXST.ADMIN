<script setup lang="ts">
import { useLayout } from '@/core/js/layouts/admin/composables/layout';
import {onBeforeMount, PropType, Ref, ref, watch} from 'vue';
import {Link} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import { MenuItem} from "@/core/js/types";

const { layoutState, setActiveMenuItem, toggleMenu } = useLayout();

const props = defineProps({
    item: {
        type: Object as PropType<MenuItem>,
        default: () => ({})
    },
    index: {
        type: Number,
        default: 0
    },
    root: {
        type: Boolean,
        default: true
    },
    parentItemKey: {
        type: String,
        default: null
    }
});

const isActiveMenu = ref(false);
const itemKey: Ref<string> = ref("");

const isExternalLink = ref(false);
const hasChildren = ref(false);

onBeforeMount(() => {
    itemKey.value = props.parentItemKey ? props.parentItemKey + '-' + props.index : String(props.index);

    const activeItem = layoutState.activeMenuItem;

    isActiveMenu.value = activeItem === itemKey.value || activeItem ? activeItem.startsWith(itemKey.value + '-') : false;

    isExternalLink.value = props.item.url != null &&
        (props.item.url.startsWith('http://') || props.item.url.startsWith('https://'));

    hasChildren.value = props.item.items != null && props.item.items.length > 0;
});

watch(
    () => layoutState.activeMenuItem,
    (newVal) => {
        isActiveMenu.value = newVal === itemKey.value ||
            (newVal !== null && newVal.startsWith(itemKey.value + '-'));
    }
);

function itemClick(event: MouseEvent, item: MenuItem) {
    if (
        item.url &&
        (layoutState.staticMenuMobileActive || layoutState.overlayMenuActive)
    ) {
        toggleMenu();
    }

    const foundItemKey = hasChildren.value ?
        (isActiveMenu.value ? props.parentItemKey : itemKey.value) :
        itemKey.value;

    setActiveMenuItem(foundItemKey);
}

function checkActiveRoute(item: MenuItem) {
    return route().current(item.url as string);
}
</script>

<template>
    <li :class="{ 'layout-root-menuitem': root, 'active-menuitem': isActiveMenu }">
        <div
            v-if="root"
            class="layout-menuitem-root-text">
            {{ item.label }}
        </div>


        <a
            v-else-if="(isExternalLink || hasChildren)"
            :class="item.class"
            :href="item.url"
            :target="item.target ?? '_blank'"
            tabindex="0"
            @click="itemClick($event, item)"
        >
            <i
                class="layout-menuitem-icon"
                :class="item.icon"
            />

            <span class="layout-menuitem-text">
                {{ item.label }}
            </span>

            <i
                v-if="hasChildren"
                class="pi pi-fw pi-angle-down layout-submenu-toggler"
            />
        </a>


        <Link
            v-else
            :class="[item.class, { 'active-route': checkActiveRoute(item) }]"
            :href="item.url"
            tabindex="0"
            @click="itemClick($event, item)"
        >
            <i
                class="layout-menuitem-icon"
                :class="item.icon"
            />

            <span class="layout-menuitem-text">
                {{ item.label }}
            </span>
        </Link>

        <Transition
            v-if="hasChildren"
            name="layout-submenu"
        >
            <ul
                v-show="root ? true : isActiveMenu"
                class="layout-submenu"
            >
                <app-menu-item
                    v-for="(child, i) in item.items"
                    :key="`${itemKey}-child-${i}`"
                    :index="i"
                    :item="child"
                    :parentItemKey="itemKey"
                    :root="false"
                />
            </ul>
        </Transition>
    </li>
</template>
