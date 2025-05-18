<x-base-layout>
    <div class="w-4/5 mx-auto my-12">
        <h1 class="text-3xl font-bold text-green-700 mb-6">Beschikbare Toernooien</h1>
        <p class="text-lg text-gray-600 mb-8">
            Ontdek de spannende toernooien die beschikbaar zijn. Klik op een toernooi voor meer informatie en het wedstrijdschema.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tournaments as $tournament)
            <a href="{{ route('wedstrijdschema.tournament', $tournament) }}"
                class="block border border-green-500 rounded-lg p-6 bg-white shadow-sm hover:shadow-lg transform transition-transform duration-300 hover:scale-105 hover:bg-green-50">
                <h2 class="font-bold text-lg text-green-700 mb-2">{{ $tournament->title }}</h2>
                <p class="text-gray-600">
                    Klik hier om meer te weten te komen over dit toernooi en om het schema te bekijken.
                </p>
            </a>
            @endforeach
        </div>
    </div>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-base-layout>
