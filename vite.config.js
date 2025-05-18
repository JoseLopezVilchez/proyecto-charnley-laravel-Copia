import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',  // Allow connections from outside the container
        port: 5000,  // Default Vite port, change it if necessary
        hmr: {
            host: 'localhost', // Important for hot module replacement to work properly
        },
    },
});
