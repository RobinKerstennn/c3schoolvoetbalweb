<x-base-layout>
    <h1>Leaderboard</h1>
    <table class="table-auto w-full border-2">
        <thead class="text-left">
            <tr>
                <th class="px-4 py-2 border-r-2">Rank</th>
                <th class="px-4 py-2 border-r-2">Team</th>
                <th class="px-4 py-2 border-r-2">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaderboard as $index => $team)
            <tr class="border-2">
                <td class="px-4 py-2 border-r-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2 border-r-2">{{ $team->name }}</td>
                <td class="px-4 py-2 border-r-2">{{ $team->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-base-layout>
