import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import fg from 'fast-glob';

const files = fg.sync(['resources/js/pages/**/*.js'], { dot: true });

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.scss",
                "resources/js/custom/store.js",
                "resources/js/main.js",
                "resources/js/app.js",
                ...files
            ],
            refresh: true,
        }),
    ],
});
