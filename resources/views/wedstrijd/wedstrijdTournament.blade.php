<x-base-layout>
    <!-- Tournament Status -->
    <div class="text-center my-8">
        @if (!$tournament->started)
            <h1 class="font-bold text-2xl text-blue-600">Toernooi is nog niet begonnen</h1>
        @else
            <h1 class="font-bold text-2xl text-red-600">Toernooi is afgelopen</h1>
        @endif

        @if (Auth::check() && Auth::user()->role == 'admin' && !$tournament->started)
            <a href="{{ route('generate.matches', $tournament) }}" class="mt-4 inline-block text-white bg-blue-500 px-6 py-2 rounded-lg shadow-lg hover:bg-blue-600">
                Generate Tournament
            </a>
        @endif
    </div>

    <!-- Match Schedule -->
    <div class="mt-10 p-6 bg-gray-100 shadow-lg rounded-lg border border-gray-300">
        <h2 class="text-xl font-bold text-green-700 mb-4">Wedstrijdschema</h2>

        <div class="space-y-4">
            @forelse ($games as $game)
                <div class="border-2 border-green-300 rounded-lg p-6 flex justify-between items-center bg-white shadow-md">
                    <div>
                        <h1 class="text-lg font-semibold text-green-800">
                            {{ $game->team1->name }} vs {{ $game->team2->name }}
                        </h1>
                        <p class="text-sm text-gray-500">Aangemaakt op: {{ $game->created_at->format('d-m-Y H:i') }}</p>
                    </div>

                    <div class="text-xl font-bold text-gray-700">
                        {{ $game->team_1_score ?? '-' }} - {{ $game->team_2_score ?? '-' }}
                    </div>

                    @if (Auth::check() && Auth::user()->role == 'admin' || Auth::check() && Auth::user()->role == 'referee')
                        <a href="{{ route('scores.addScores', $game) }}" class="text-sm text-blue-500 hover:underline">Voeg Scores Toe</a>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Geen wedstrijden beschikbaar.</p>
            @endforelse
        </div>
    </div>

    <!-- Leaderboard -->
    <div class="mt-12">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Leaderboard</h2>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 text-left">Rank</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Team</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Score</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $rank = 0;
                    $previousScore = null;
                @endphp

                @foreach ($leaderboard as $team)
                    @php
                        if ($team->score !== $previousScore) {
                            $rank++;
                        }
                        $previousScore = $team->score;
                    @endphp

                    <tr class="border">
                        <td class="px-4 py-2 border border-gray-300">{{ $rank }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $team->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $team->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Teams in Tournament -->
    <div class="mt-12">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Teams die met dit toernooi meedoen</h2>
        <ul class="list-disc pl-6 text-gray-700">
            @foreach ($tournament->teams as $team)
                <li>{{ $team->name }}</li>
            @endforeach
        </ul>
    </div>

    <!-- Remaining Teams -->
    <div class="mt-8">
        @php
            $teams_remaining = max(0, 8 - $max_teams);
        @endphp

        @if ($teams_remaining == 0)
            <h2 class="text-lg text-green-600 font-semibold">Het toernooi kan starten!</h2>
        @else
            <h2 class="text-lg text-red-600 font-semibold">Nog {{ $teams_remaining }} team(s) nodig om te starten.</h2>
        @endif
    </div>

    <!-- Error Messages -->
    <!-- @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-6" role="alert">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
</x-base-layout>
