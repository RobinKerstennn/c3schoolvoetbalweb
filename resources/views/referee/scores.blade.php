<x-base-layout>
    <a class="border-2 border-green-500 bg-green-500 hover:bg-green-600 p-4 rounded-lg" href="{{route('referee.addScores')}}">Voeg scores toe</a>
<div class="border-2 rounded-xl p-6 flex flex-col gap-4 mb-8 mt-8 bg-gray-50 shadow-lg">
        @foreach ($games as $game)
        <div class="flex justify-between items-center border-b pb-2 mb-2 last:border-none last:pb-0 last:mb-0">
            <h1 class="text-lg font-bold text-gray-800">
                {{$game->team1->name}} vs {{$game->team2->name}}
            </h1>
            <h1 class="text-lg font-semibold text-gray-700">
                {{$game->team_1_score}} - {{$game->team_2_score}}
            </h1>
        </div>
        @endforeach
    </div>
</x-base-layout>
