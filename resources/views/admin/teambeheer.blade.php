<x-base-layout>
    <div class="container mx-auto px-4 py-6 grid grid-cols-3 gap-10">
        <div class="col-span-2">
            <h2 class="text-xl font-bold mb-4">Bestaande Teams</h2>
            <ul class="bg-white shadow-md rounded p-4 space-y-2">
                @forelse($teams as $team)
                    <li class="pb-2">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $team->name }}</h3>
                                <p class="text-sm text-gray-700">Gemaakt door: {{ $team->user->name }}</p>
                            </div>
                            <a href="{{ route('teams.edit', $team->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium">
                               Bewerken
                            </a>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-500">Er zijn nog geen teams aangemaakt.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-base-layout>