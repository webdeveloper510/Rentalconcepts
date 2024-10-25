<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Rental Concepts - Competition</title>



    <!-- Fonts -->

    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />



    <!-- Tailwind CSS -->

    <script src="https://cdn.tailwindcss.com"></script>



    <!-- Styles -->

    <style>
        .background-image {
            background-image: url("{{ asset('competition/public/image/sport-and-entertainment.png') }}");
            background-size: cover;
            background-position: center;
        }
    </style>

</head>



<body class="background-image bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <div class="sm:flex sm:justify-between sm:items-center p-6 z-10">
        @if (Route::has('login'))
        <div class="flex items-center justify-between w-full">
            @if (!auth()->check())
            <img src="{{ asset('competition/public/logo/RNR_round_clr-flat.png') }}" alt="Logo" style="height:70px; width:70px;" class="ml-4" />
            @endif
            <div class="flex items-center">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                <a href="{{ route('login') }}"
                    class="ml-4 font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
                @endauth
            </div>
        </div>
        @endif
    </div>


    <!-- Hero Section -->

    <header class="hero-bg min-h-screen flex items-center justify-center text-center">

        <div class="bg-black bg-opacity-50 p-10 rounded-lg">

            <h1 class="text-4xl font-extrabold text-white sm:text-6xl">Welcome to Sports & Entertainment Hub</h1>

            <p class="mt-4 text-lg text-gray-300">Your one-stop for live updates, event highlights, and more!</p>

            <a href="#events"

                class="mt-6 inline-block bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600">Explore Events</a>

        </div>

    </header>



    <!-- Upcoming Events Section -->

    <!-- <section id="events" class="py-16 bg-gray-100 dark:bg-gray-900">

        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-8">Upcoming Events</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

             

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                    <img src="https://example.com/event1.jpg" alt="Event 1" class="w-full h-40 object-cover">

                    <div class="p-6">

                        <h3 class="text-lg font-semibold mb-2">Football Championship</h3>

                        <p class="text-gray-600 dark:text-gray-400">Date: Oct 10, 2024</p>

                        <p class="mt-4">Don't miss the grand football finale between top teams.</p>

                    </div>

                </div>

               

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                    <img src="https://example.com/event2.jpg" alt="Event 2" class="w-full h-40 object-cover">

                    <div class="p-6">

                        <h3 class="text-lg font-semibold mb-2">Live Music Festival</h3>

                        <p class="text-gray-600 dark:text-gray-400">Date: Oct 12, 2024</p>

                        <p class="mt-4">Experience live performances from top bands and artists.</p>

                    </div>

                </div>

             

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                    <img src="https://example.com/event3.jpg" alt="Event 3" class="w-full h-40 object-cover">

                    <div class="p-6">

                        <h3 class="text-lg font-semibold mb-2">Basketball Tournament</h3>

                        <p class="text-gray-600 dark:text-gray-400">Date: Oct 15, 2024</p>

                        <p class="mt-4">Witness the best basketball teams in action this season.</p>

                    </div>

                </div>

            </div>

        </div>

    </section> -->



    <!-- Featured Teams Section -->

    <!-- <section id="teams" class="py-16 bg-white dark:bg-gray-800">

        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-8">Featured Teams</h2>

            <div class="flex flex-wrap justify-center">

                <div class="m-4">

                    <img src="https://example.com/team1-logo.jpg" alt="Team 1" class="w-32 h-32 mx-auto">

                    <p class="mt-2">Team Aces</p>

                </div>

                <div class="m-4">

                    <img src="https://example.com/team2-logo.jpg" alt="Team 2" class="w-32 h-32 mx-auto">

                    <p class="mt-2">Team Titans</p>

                </div>

                <div class="m-4">

                    <img src="https://example.com/team3-logo.jpg" alt="Team 3" class="w-32 h-32 mx-auto">

                    <p class="mt-2">Team Strikers</p>

                </div>

            </div>

        </div>

    </section> -->



    <!-- Live Sports Highlights Section -->

    <!-- <section id="highlights" class="py-16 bg-gray-100 dark:bg-gray-900">

        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-8">Live Sports Highlights</h2>

            <p class="mb-8 text-lg">Catch the best moments from recent matches!</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                    <img src="https://example.com/highlight1.jpg" alt="Highlight 1" class="w-full h-40 object-cover">

                    <div class="p-6">

                        <h3 class="text-lg font-semibold mb-2">Soccer Finals</h3>

                        <a href="#" class="text-red-500">Watch now</a>

                    </div>

                </div>

                

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                    <img src="https://example.com/highlight2.jpg" alt="Highlight 2" class="w-full h-40 object-cover">

                    <div class="p-6">

                        <h3 class="text-lg font-semibold mb-2">Basketball League</h3>

                        <a href="#" class="text-red-500">Watch now</a>

                    </div>

                </div>

                

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                    <img src="https://example.com/highlight3.jpg" alt="Highlight 3" class="w-full h-40 object-cover">

                    <div class="p-6">

                        <h3 class="text-lg font-semibold mb-2">Tennis Grand Slam</h3>

                        <a href="#" class="text-red-500">Watch now</a>

                    </div>

                </div>

            </div>

        </div>

    </section> -->



    <!-- Footer -->

    <footer class="py-6 bg-gray-800 dark:bg-gray-700 text-gray-200">

        <div class="container mx-auto text-center">

            <p>&copy; 2024 Sports & Entertainment. All rights reserved.</p>

        </div>

    </footer>

    <!-- <div

        class="">

        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-7 p-6 text-right z-10">

            @auth


            <a href="{{ url('/dashboard') }}"

                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>

            @else

            <a href="{{ route('login') }}"

                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log

                in</a>



            @if (Route::has('register'))

            <a href="{{ route('register') }}"

                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>

            @endif

            @endauth

        </div>

        @endif

    </div> -->

</body>



</html>