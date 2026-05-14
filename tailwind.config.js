import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'dineary-olive': '#7E8363',
                'dineary-brown': '#8B3B08',
                'dineary-cream-light': '#FDF7E9',
            },
            fontFamily: {
                // Panggilan Font Baru
                bagh: ['"UT Bagh"', 'serif'],
                stack: ['"Stack Sans"', 'sans-serif'],
            },
        },
    },
    plugins: [forms],
};