<x-base-layout>
    <form action="{{route('user.storeTeam')}}" method="post">
        @csrf

        <h1 class="font-bold text-xl mb-10">VOEG TEAM TOE AAN TOURNAMENT</h1>

        <div>
            <div class="w-3/5 flex flex-col mb-8">
                <label for="team">Select team</label>
                <select name="team" id="team">
                    @foreach ($user->team as $team)
                    <option value="{{ $team->name }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-3/5 flex flex-col mb-8">
                <label for="tournament">Select tournament</label>
                <select name="tournament" id="tournament">
                    @foreach ($tournaments as $tournament)
                    <option value="{{ $tournament->title }}">{{ $tournament->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" value="Voeg team toe" class="p-2 bg-blue-600 rounded-xl hover:bg-blue-700">
    </form>
</x-base-layout>
