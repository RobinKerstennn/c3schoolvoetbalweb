<x-base-layout>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Gebruikerslijst</h2>
        <div class="bg-white shadow-md rounded">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-6 py-3 text-gray-700">NAAM</th>
                        <th class="text-left px-6 py-3 text-gray-700">E-MAIL</th>
                        <th class="text-left px-6 py-3 text-gray-700">ROLE</th>
                        <th class="text-left px-6 py-3 text-gray-700">TEAMNAAM</th>
                        <th class="text-left px-6 py-3 text-gray-700">ACTIES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 text-gray-800">{{ $user->name }}</td>
                        <td class="px-6 py-3 text-gray-800">{{ $user->email }}</td>
                        <td class="px-6 py-3 text-gray-800 capitalize">{{ $user->role }}</td>
                        <td class="px-6 py-3 text-gray-800">
                            @if($user->team)
                            @foreach ($user->team as $team)
                            {{ $team->name }},
                            @endforeach
                            @else
                            <span class="text-gray-500 italic">Geen team</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 flex items-center space-x-4">
                            <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                                EDIT
                            </a>
                            <form action="{{ route('users.delete', $user) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                                    DELETE
                                </button>
                            </form>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">
                            Geen gebruikers gevonden.
                        </td>
                    </tr> -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
