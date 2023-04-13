<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{asset('css/toastr.css')}}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{asset('js/jquery-3-6-4.js')}}"></script>
        <script src="{{asset('js/toastr.min.js')}}"></script>
        <script src="{{asset('js/toastRWithTime.js')}}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        {{-- <button id="dark-mode-toggle" class="fixed bottom-0 right-0 m-4 bg-white border rounded-md shadow-md p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0 2a10 10 0 100-20 10 10 0 000 20z"/>
                <path d="M10 0h1v20h-1V0z" />
                <path d="M5.5 5.5L7 7l3.5 3.5 1-1L8 6.5 10.5 4l-1-1L7 5.5l-1.5-1zM15.5 15.5L17 17l3.5 3.5 1-1L18 16.5l2.5-2.5-1-1-2.5 2.5-2.5-2.5-1 1z"/>
            </svg>
        </button> --}}
        <button id="dark-mode-toggle" class="fixed bottom-0 right-0 m-4 bg-white border rounded-md shadow-md p-2">
            <span class="ml-2">Switch Theme</span>
        </button>
    </body>
</html>
