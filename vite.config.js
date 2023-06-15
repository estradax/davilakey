import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/tailwind.css',
                'resources/js/template/templatemo.js',
                'resources/js/template/custom.js',
                'resources/ts/island/navigation.tsx'
            ],
            refresh: true,
        }),
    ],
});
