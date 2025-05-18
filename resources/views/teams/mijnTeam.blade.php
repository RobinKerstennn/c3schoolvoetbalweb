<x-base-layout>
    <!-- My Teams Section -->
    <div class="mb-12">
        <h1 class="font-extrabold text-4xl text-center text-green-800 mb-6">MIJN TEAM(S)</h1>

        <div class="space-y-10">
            @foreach ($mijnTeam as $team)
            <!-- Team Card -->
            <div class="bg-green-100 text-green-800 rounded-xl shadow-lg p-6">
                <h1 class="font-bold text-2xl mb-4 border-b pb-2">{{$team->name}}</h1>

                @if ($team->players)
                @php
                $players = json_decode($team->players, true);
                @endphp

                <p class="text-lg font-semibold underline mb-4">Players / Spelers</p>
                <ul class="space-y-2 pl-4">
                    @foreach ($players as $player)
                    <li class="text-green-800 bg-green-200 p-2 rounded-lg shadow-md">{{$player}}</li>
                    @endforeach
                </ul>
                @else
                <p class="text-lg text-green-500">Geen spelers gevonden voor dit team.</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Add Team Section -->
    <div class="flex justify-center mt-10">
        <a href="{{route('user.addTeam')}}" class="inline-block bg-green-500 hover:bg-green-600 text-white text-lg font-bold px-6 py-3 rounded-full shadow-md transform transition duration-300 hover:scale-105">
            Voeg team aan tournament
        </a>
    </div>
</x-base-layout>
