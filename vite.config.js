import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/khqr/generateQR.js',
                'resources/js/khqr/showQR.js',
            ],

            refresh: true,
        }),
    ],
});
