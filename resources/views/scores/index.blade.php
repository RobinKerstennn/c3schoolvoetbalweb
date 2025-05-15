<x-base-layout>
    <div class="mt-10 p-10 bg-gray-50 shadow-lg rounded-lg border border-green-500">
        <h2 class="text-2xl font-bold text-green-600 pb-4">Scores</h2>

        <div class="flex flex-col gap-4">
            @foreach ($games as $game)
                <div class="border-2 border-green-300 rounded-lg p-6 flex justify-between items-center bg-white shadow-md">
                    <h1 class="text-lg font-bold text-green-800">
                        {{ $game->team1->name }} vs {{ $game->team2->name }}
                    </h1>
                    <h1 class="text-lg font-semibold text-green-700">
                        {{ $game->team_1_score }} - {{ $game->team_2_score }}
                    </h1>
                </div>
            @endforeach
        </div>
    </div>
</x-base-layout>
