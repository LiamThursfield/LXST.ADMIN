/* @ts-expect-error This seems to be purely an IDE error */
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
/* @ts-expect-error This seems to be purely an IDE error */
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/central/js/app.ts',
                'resources/tenant/js/app.ts',
            ],
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
