<x-base-layout>
    <form action="" method="post" class="mx-auto w-3/5">
        <div class="grid grid-cols-3 gap-2 mb-6">
            @foreach ($games as $game)
            <div>
                <label for="team1" class="font-bold text-xl flex flex-col">{{$game->team1->name}}</label>
                <input type="number" name="team1" id="team1" value="{{$game->team1->team_1_score}}">
            </div>

            <h1 class="flex justify-center items-center">VS</h1>

            <div>
                <label for="team2" class="font-bold text-xl flex flex-col">{{$game->team2->name}}</label>
                <input type="number" name="team2" id="team2" value="{{$game->team1->team_2_score}}">
            </div>
            @endforeach
        </div>

        <input type="submit" value="Add scores" class="border-2 border-blue-400 p-2 rounded-lg w-36 bg-blue-500 hover:text-white hover:bg-blue-600">
    </form>
</x-base-layout>
