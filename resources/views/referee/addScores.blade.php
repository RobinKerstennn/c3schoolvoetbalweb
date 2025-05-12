<x-base-layout>
    <form action="{{ route('referee.storeScores') }}" method="post" class="mx-auto w-3/5">
        @csrf
        <div class="grid grid-cols-3 gap-2 mb-6">
            @foreach ($games as $game)
                <div>
                    <label class="font-bold text-xl flex flex-col">
                        {{ $game->team1->name }}
                        <input type="number" name="scores[{{ $game->id }}][team1]" value="{{ $game->team_1_score }}"
                            required>
                    </label>
                </div>

                <h1 class="flex justify-center items-center">VS</h1>

                <div>
                    <label class="font-bold text-xl flex flex-col">
                        {{ $game->team2->name }}
                        <input type="number" name="scores[{{ $game->id }}][team2]" value="{{ $game->team_2_score }}"
                            required>
                    </label>
                </div>
                <input type="hidden" name="scores[{{ $game->id }}][game_id]" value="{{ $game->id }}">

            @endforeach
        </div>

        <input type="submit" value="Add scores"
            class="border-2 border-blue-400 p-2 rounded-lg w-36 bg-blue-500 hover:text-white hover:bg-blue-600">
    </form>
</x-base-layout>