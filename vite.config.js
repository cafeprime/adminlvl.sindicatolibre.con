import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.min.css', 
                'resources/css/app.min.css', 
                'resources/css/app-dark.min.css', 
                'resources/css/icons.min.css', 
                'resources/css/estilos.css', 
                'resources/css/flatpickr.min.css', 

                'resources/js/login.min.js',     
                'resources/js/app.min.js',               
                'resources/js/registros-listar.js',               
                'resources/js/flatpickr.min.js',               
            ],
            refresh: true,
        }),
    ],
});
