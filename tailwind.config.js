/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#33A1C3',
                primary_600: '#74CFEC',
                primary_300: '#A4E9FF',
                primary_100: '#E1F8FF',
                secondary: '#4F4F4F',
                secondary_600: '#737373',
                secondary_300: '#9F9F9F',
                secondary_100: '#F5F5F5',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
