import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { definePreset } from '@primeuix/themes';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import PrimeVue from 'primevue/config';
import type { DefineComponent } from 'vue';
import Aura from '@primeuix/themes/aura';
import { createApp, h } from 'vue';
import {ZiggyVue} from "ziggy-js";
import ToastService from 'primevue/toastservice';

const appName = import.meta.env.VITE_APP_NAME || 'LXST.ADMIN';

const LxstAdminPreset = definePreset(Aura, {
    semantic: {
        primary: {
            50: '{indigo.50}',
            100: '{indigo.100}',
            200: '{indigo.200}',
            300: '{indigo.300}',
            400: '{indigo.400}',
            500: '{indigo.500}',
            600: '{indigo.600}',
            700: '{indigo.700}',
            800: '{indigo.800}',
            900: '{indigo.900}',
            950: '{indigo.950}',
        },
    },
});

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: LxstAdminPreset,
                    options: {
                        darkModeSelector: '.app-dark'
                    }
                },
            })
            .use(ToastService)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
