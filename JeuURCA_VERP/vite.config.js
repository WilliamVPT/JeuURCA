import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import postcss from 'vite-plugin-postcss';

export default defineConfig({
    plugins: [
        vue(),
        postcss(),
        
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                'app/Livewire/**',
                ...refreshPaths,
            ],
        }),
    ],
});
