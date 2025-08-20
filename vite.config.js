import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true, // if you want Vite to fail if the port is already in use
        cors: {
            origin: '*', // or the specific origin of your Laravel app
            credentials: true,
        },
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: ['resources/scss/style.scss', 'resources/js/app.js',
                    'resources/admin/scss/style.scss', 'resources/admin/js/main.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
    css: {
        devSourcemap: true,
    },
});
