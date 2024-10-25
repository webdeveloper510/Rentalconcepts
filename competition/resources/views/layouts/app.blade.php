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

    <!-- Bootstrap CSS (Bootstrap 5) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <link rel="preload" as="style" href="{{ asset('competition/public/build/assets/app-59a60e7b.css') }}" />
    <link rel="modulepreload" href="{{ asset('competition/public/build/assets/app-f93993be.js') }}" />
    <link rel="stylesheet" href="{{ asset('competition/public/build/assets/app-59a60e7b.css') }}" />
    <script type="module" src="{{ asset('competition/public/build/assets/app-f93993be.js') }}"></script>

    <style>
        /* Additional styling for table rows */
        #storeTable tbody tr {
            transition: background-color 0.3s ease;
        }

        #storeTable tbody tr:hover {
            background-color: #f7fafc;
            /* Light gray background on hover */
        }

        .main-logo {
            width: 60px;
        }
    </style>
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

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- Bootstrap JS (Bootstrap 5) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>