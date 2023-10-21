<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Atalho')</title>
        <script src="
        https://cdn.jsdelivr.net/npm/vue-3-tailwind-css-pagination@0.1.5/dist/vue3-tailwindcss-pagination.umd.min.js
        "></script>
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="bg-white dark:bg-gray-900 dark:text-white">
        @inertia
    </body>
</html>
