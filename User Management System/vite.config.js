import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                 'resources/js/app.js',
                 'resources/css/log.css',
                 'resources/css/index.css',
                 'resources/css/create.css',
                 'resources/css/show.css'
                ],
            refresh: true,
        }),
    ],
});
