<x-base-layout>
    <div class="mt-10 p-10 bg-gray-50 shadow-lg rounded-lg border border-green-500">
        <h2 class="text-xl font-bold text-green-600 pb-4">Wedstrijdschema</h2>

        <div class="flex flex-col gap-4">
            @forelse ($games as $game)
                <div class="border-2 border-green-300 rounded-lg p-6 flex justify-between items-center bg-white shadow-md">

                    <div>
                        <h1 class="text-lg font-bold text-green-800">
                            {{ $game->team1->name }} vs {{ $game->team2->name }}
                        </h1>
                        <p class="text-sm text-gray-500">Aangemaakt op: {{ $game->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                </div>

            @empty
                <p class="text-gray-500">Geen wedstrijden beschikbaar.</p>
            @endforelse
        </div>
    </div>
</x-base-layout>