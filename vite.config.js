import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fg from 'fast-glob';

const files = fg.sync(['resources/js/**/*.js'], { dot: true });

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/style.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
                ...files
            ],
            refresh: true,
        }),
    ],
});
