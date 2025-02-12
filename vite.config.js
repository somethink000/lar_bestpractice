import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
        server: {
            host: true,
            port: 5173,
            hmr: {
                host: 'localhost',//kep.pw
            },
            watch: {
                usePolling: true,
            },
        },
    
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
});