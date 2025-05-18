<x-base-layout>
   <div>
        <h1 class="text-2xl font-bold text-green-500 mb-4">Welkom op de 4S Tournament Website</h1>
        <p class="text-lg text-gray-700 mb-8">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum ad, labore veniam iure explicabo excepturi blanditiis
            nulla quas fugit tempora laboriosam praesentium accusamus, id quo, ratione amet repudiandae a? Ipsum!
        </p>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">Beschikbare Toernooien:</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tournaments as $tournament)
            <a href="{{route('wedstrijdschema.tournament', $tournament)}}" class="p-4 bg-gray-100 border border-gray-300 rounded-lg transform transition duration-300 hover:scale-110 hover:shadow-xl hover:bg-white">
                <h3 class="font-bold text-lg text-green-500 mb-2">{{ $tournament->title }}</h3>
                <p class="text-gray-600">Details over dit toernooi volgen snel.</p>
            </a>
            @endforeach
        </div>
</x-base-layout>
