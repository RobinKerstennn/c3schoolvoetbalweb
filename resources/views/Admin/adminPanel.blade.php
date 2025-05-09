<x-base-layout>

    <div>
        <a href="">Make new tournament</a>
    </div>
    <div class="border-2 rounded-xl p-4 flex justify-between">
        @foreach ($games as $game)
        <h1>{{$game->team_1}} vs {{$game->team_2}}</h1>
        <h1>{{$game->team_1_score}} - {{$game->team_2_score}}</h1>
        @endforeach
    </div>

    <div class="grid grid-cols-3">
        <div class="border-2 p-4 rounded-xl hover:shadow-xl">
            @foreach ($tournaments as $tournament)
            <h1>{{$tournament->name}}</h1>
            @endforeach
        </div>
        <div class="border-2 p-4 rounded-xl hover:shadow-xl">
            @foreach ($users as $user)
            <h1>{{$user->name}}</h1>
            @endforeach
        </div>
        <div>
            @foreach ($teams as $team)
            <h1>{{$team->name}}</h1>
            @endforeach
        </div>
    </div>
</x-base-layout>
