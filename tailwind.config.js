const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'tile': '4px 4px 4px 1px rgba(0, 0, 0, 0.2), -4px -4px 4px 1px rgba(255, 255, 255, 1)',
                'hovered-tile' : '2px 2px 4px 1px rgba(0, 0, 0, 0.2), -2px -2px 4px 1px rgba(255, 255, 255, 1)',
            },

        },
    },

    plugins: [require('@tailwindcss/forms')],
};
