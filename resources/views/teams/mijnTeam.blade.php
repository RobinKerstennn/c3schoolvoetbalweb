<x-base-layout>
    <h1>MIJN TEAM(S)</h1>
    @foreach ($mijnTeam as $team)
    <h1>{{$team->name}}</h1>
    @forelse ($team->players as $player)
    <li>{{$player}}</li>
    @empty
    <p>Geen spelers gevonden</p>
    @endforelse
    @endforeach
</x-base-layout>
