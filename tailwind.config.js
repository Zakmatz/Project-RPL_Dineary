import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
<<<<<<< HEAD
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
                // Menggunakan font default sistem agar langsung jalan tanpa error
                heading: ['Georgia', 'Times New Roman', 'serif'],
                body: ['ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [forms],
};
=======

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
>>>>>>> b7aeff2fc6d6abe874e5f7d54ea1bd9f5b6e1ac6
