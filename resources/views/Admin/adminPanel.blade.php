<x-base-layout>

    <div class="mb-8 flex justify-between w-2/5">
        <a href="{{route('tournaments.create')}}" class="text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600">
            Make New Tournament
        </a>

        <a href="{{route('generate.matches')}}" class="text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600">
            Generate Tournament
        </a>

    </div>

    <div class="border-2 rounded-xl p-6 flex flex-col gap-4 mb-8 bg-gray-50 shadow-lg">
        @foreach ($games as $game)
            <div class="flex justify-between items-center border-b pb-2 mb-2 last:border-none last:pb-0 last:mb-0">
                <h1 class="text-lg font-bold text-gray-800">
                    {{$game->team1->name}} vs {{$game->team2->name}}
                </h1>
                <h1 class="text-lg font-semibold text-gray-700">
                    {{$game->team_1_score}} - {{$game->team_2_score}}
                </h1>
                </h1>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <a class="border-2 p-6 rounded-xl transform transition duration-300 hover:scale-110 shadow-xl bg-white"
            href="{{ route('tournaments.index') }}">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Tournaments</h2>
            @foreach ($tournaments as $tournament)
                <h1 class="text-gray-700 font-medium">{{ $tournament->title }}</h1>
            @endforeach
    </div>
    </a>

    <a class="border-2 p-6 rounded-xl transform transition duration-300 hover:scale-110 shadow-xl bg-white"
        href="{{ route('users.index') }}">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Users</h2>
        @foreach ($users as $user)
        <h1 class="text-gray-700 font-medium">{{$user->name}}</h1>
        @endforeach
    </a>

    <a class="border-2 p-6 rounded-xl transform transition duration-300 hover:scale-110 shadow-xl bg-white" href="{{route('teams.index')}}">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Teams</h2>
            @foreach ($teams as $team)
            <h1 class="text-gray-700 font-medium">{{$team->name}}</h1>
            @endforeach
        </a>

        </div>
</x-base-layout>
