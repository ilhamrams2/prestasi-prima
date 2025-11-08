import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import compression from 'vite-plugin-compression';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        compression({
            algorithm: 'gzip',
            ext: '.gz',
            threshold: 10240,
            apply: 'build',
        }),
        compression({
            algorithm: 'brotliCompress',
            ext: '.br',
            threshold: 10240,
            apply: 'build',
        }),
    ],
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
    },
});