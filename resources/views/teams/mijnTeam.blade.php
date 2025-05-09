<x-base-layout>
    <h1>MIJN TEAM(S)</h1>
    @foreach ($mijnTeam as $team)
        <p>{{$team->name}}</p>
    @endforeach
</x-base-layout>
