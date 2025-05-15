<x-base-layout>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-xl font-bold mb-4">Tournaments</h2>
        <table class="w-full bg-white shadow-md rounded overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="text-left px-4 py-2">TOURNAMENT ID</th>
                    <th class="text-left px-4 py-2">NAAM</th>
                    <th class="text-left px-4 py-2">MAXIMAAL AANTAL TEAMS</th>
                    <th class="text-left px-4 py-2">ACTIES</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tournaments as $tournament)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $tournament->id }}</td>
                    <td class="px-4 py-2">{{ $tournament->title }}</td>
                    <td class="px-20 py-2">{{ $tournament->max_teams }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{route('tournaments.edit', $tournament)}}" class="text-blue-600 hover:text-blue-800 font-medium">EDIT</a>
                        <form action="{{route('tournament.delete', $tournament)}}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DELETE" class="text-red-600 hover:text-red-800 font-medium">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-500 py-4">Geen toernooien gevonden.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-base-layout>