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
                'dineary-cream': '#F8F4EB',
                'dineary-yellow': '#EFC878',
                'dineary-green': '#7D8866',
                'dineary-orange': '#DF9622',
                'dineary-brown': '#8B3E0B',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                heading: ['Georgia', 'Times New Roman', 'serif'],
                body: ['ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
