<x-base-layout>
    <div class="container mx-auto px-4 py-6 ">
        <h1>MIJN TEAM</h1>
        @foreach ($teams as $team)
            <p>Team Naam: {{$team->name}}</p>
            <p></p>
        @endforeach

    </div>
</x-base-layout>