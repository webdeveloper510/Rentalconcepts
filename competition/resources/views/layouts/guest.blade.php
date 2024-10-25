<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('competition/public/logo/RNR_round_clr-flat.png')}}" rel="apple-touch-icon">
    <link href="{{ asset('competition/public/logo/RNR_round_clr-flat.png')}}" rel="icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <link rel="preload" as="style" href="{{ asset('competition/public/build/assets/app-59a60e7b.css') }}" />
    <link rel="modulepreload" href="{{ asset('competition/public/build/assets/app-f93993be.js') }}" />
    <link rel="stylesheet" href="{{ asset('competition/public/build/assets/app-59a60e7b.css') }}" />
    <script type="module" src="{{ asset('competition/public/build/assets/app-f93993be.js') }}"></script>

    <style>
        .background-image {
            background-image: url("{{ asset('competition/public/image/background-image.jpg') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="background-image font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>