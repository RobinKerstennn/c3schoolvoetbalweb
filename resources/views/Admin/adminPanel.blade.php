<x-base-layout>
    <!-- Tournament Selection Section -->
    <div class="mb-8 flex justify-between w-full sm:w-1/2 lg:w-1/4 mx-auto">
        <a href="{{route('tournaments.create')}}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 px-6 py-3 rounded-lg shadow-xl hover:bg-gradient-to-l transition duration-300 transform hover:scale-105">
            <span class="text-lg font-semibold">Create New Tournament</span>
        </a>
    </div>

    <!-- Cards for Quick Links Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Tournament Card -->
        <a href="{{route('tournaments.index')}}" class="border-2 p-6 rounded-xl bg-gradient-to-r from-gray-100 to-white shadow-2xl transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Tournaments</h2>
            <ul class="space-y-3">
                @foreach ($tournaments as $tournament)
                    <li class="text-lg font-medium text-gray-700 hover:text-blue-500 transition duration-300">{{$tournament->title}}</li>
                @endforeach
            </ul>
        </a>

        <!-- Users Card -->
        <a href="{{route('users.index')}}" class="border-2 p-6 rounded-xl bg-gradient-to-r from-gray-100 to-white shadow-2xl transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Users</h2>
            <ul class="space-y-3">
                @foreach ($users as $user)
                    <li class="text-lg font-medium text-gray-700 hover:text-blue-500 transition duration-300">{{$user->name}}</li>
                @endforeach
            </ul>
        </a>

        <!-- Teams Card -->
        <a href="{{route('teams.index')}}" class="border-2 p-6 rounded-xl bg-gradient-to-r from-gray-100 to-white shadow-2xl transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Teams</h2>
            <ul class="space-y-3">
                @foreach ($teams as $team)
                    <li class="text-lg font-medium text-gray-700 hover:text-blue-500 transition duration-300">{{$team->name}}</li>
                @endforeach
            </ul>
        </a>
    </div>
</x-base-layout>
