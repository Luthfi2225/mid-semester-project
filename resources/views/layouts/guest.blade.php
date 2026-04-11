<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-white dark:bg-[#0a0a0a] text-gray-900 dark:text-white antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center">
            <div class="flex justify-center items-center w-120 h-50 dark:bg-[#161615] rounded-t-xl">
                <a href="/">
                    <x-application-logo class="w-30 h-30 fill-current text-gray-500" />
                </a>
            </div>

            <div class="text-center w-120 dark:bg-[#161615] rounded-b-xl px-8 overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
