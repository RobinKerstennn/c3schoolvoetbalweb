<x-base-layout>
    <div class="w-2/5 mx-auto my-20 rounded-lg shadow-lg p-16">

        <h1 class="font-bold text-3xl text-blue-600 mb-10">Voeg scores toe</h1>
        <form action="{{route('scores.store', $game)}}" method="post">
            @csrf
            <div>
                <label class="font-bold text-xl flex flex-col">
                    {{ $game->team1->name }}
                    <input type="number" name="team1" value="{{ $game->team_1_score }}" required>
                </label>
            </div>

            <h1 class="flex justify-center items-center">VS</h1>

            <div class="mb-10">
                <label class="font-bold text-xl flex flex-col">
                    {{ $game->team2->name }}
                    <input type="number" name="team2" value="{{ $game->team_2_score }}" required>
                </label>
            </div>
            <input type="hidden" name="game_id" value="{{ $game->id }}">
            <input type="submit" value="Edit Score" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg font-bold hover:bg-blue-600 transition duration-200">
        </form>
    </div>
</x-base-layout>
