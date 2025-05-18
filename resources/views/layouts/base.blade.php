<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '4S Tournament Website' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="bg-green-500 text-white shadow-md">
        <nav class="w-4/5 mx-auto py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}">
                <img class="h-12" src="{{ asset('img/4s-logo.png') }}" alt="4S Logo">
            </a>

            <!-- Navigation Links -->
            <div class="flex space-x-6 items-center">
                @guest
                <a href="{{ route('home') }}" class="hover:text-green-800">Home</a>
                <a href="{{ route('wedstrijdschema') }}" class="hover:text-green-800">Wedstrijd Schema</a>
                <a href="{{ route('login') }}"
                    class="px-4 py-2 bg-white text-green-500 rounded-md hover:bg-green-600 hover:text-white">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 border border-white rounded-md text-white hover:bg-white hover:text-green-500">
                    Register
                </a>
                @endguest

                @auth
                <a href="{{ route('home') }}" class="hover:text-green-800">Home</a>
                <a href="{{ route('wedstrijdschema') }}" class="hover:text-green-800">Wedstrijd Schema</a>
                <a href="{{ route('teams.mijnTeam') }}" class="hover:text-green-800">Mijn Team</a>

                @if (Auth::user() && Auth::user()->role == 'admin')
                <a href="{{ route('teams.index') }}" class="hover:text-green-800">Team Beheer</a>
                <a href="{{ route('admin.teambeheer') }}" class="hover:text-green-800">Alle teams</a>
                <div class="relative group">
                    <!-- Fixed Admin Panel Link -->
                    <a href="{{ route('admin.adminPanel') }}" class="hover:text-green-800 inline-block group-hover:border-b-2 border-green-800">
                        Admin Panel
                    </a>

                    <!-- Dropdown Menu -->
                    <ul
                        class="absolute left-0 w-48 mt-1 bg-green-800 rounded shadow-lg opacity-0 group-hover:opacity-100 duration-300">
                        <li class="block text-white hover:text-gray-800 p-2">
                            <a href="{{ route('users.index') }}">Users</a>
                        </li>
                        <li class="block text-white hover:text-gray-800 p-2">
                            <a href="{{ route('tournaments.index') }}">Tournaments</a>
                        </li>
                        <li class="block text-white hover:text-gray-800 p-2">
                            <a href="{{ route('admin.teambeheer') }}">Teams</a>
                        </li>
                    </ul>
                </div>
                @endif

                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Logout</button>
                </form>
                @endauth

                <a href="{{ route('profile.edit') }}">
                    <img class="h-10 w-10 rounded-full border-2 border-white" src="{{ asset('img/profile.jpg') }}"
                        alt="Avatar">
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="w-4/5 mx-auto my-12 p-10 shadow-lg rounded-lg">
        @if ($errors->any())
        @dd($errors)
        @endif
        {{$slot}}
    </main>

    <!-- Footer -->
    <footer class="bg-green-500 text-white py-6">
        <div class="w-4/5 mx-auto flex justify-between items-center">
            <p>&copy; 2024 Eric, Tijn en Jort. All rights reserved.</p>
            <a href="#top" class="hover:text-green-800">Back to top</a>
        </div>
    </footer>
</body>

</html>
