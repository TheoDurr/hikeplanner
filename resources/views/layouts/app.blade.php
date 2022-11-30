<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    {{ $head ?? '' }}<!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    @if(session()->has('message-success'))
        <div role="alert">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mx-5 my-5">
                Success
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-2">
                {{ session('message-success') }}
            </div>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mx-5 my-5 rounded relative" role="alert">
            <strong class="font-bold">{{ __("Error :") }}</strong>
            <span class="block sm:inline">{{ session('message-error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"><title>Close</title><path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
@livewireScripts
</body>
</html>
