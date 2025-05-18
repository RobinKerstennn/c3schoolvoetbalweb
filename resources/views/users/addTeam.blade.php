<x-base-layout>
    <!-- Teams Section -->
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">Bestaande Teams</h1>
            <p class="text-lg text-gray-600">Bekijk en beheer de teams die zijn aangemaakt.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Teams List -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Teams</h2>
                    <ul class="divide-y divide-gray-200">
                        @forelse($teams as $team)
                            <li class="py-4">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-800">{{ $team->name }}</h3>
                                        <p class="text-sm text-gray-600">Gemaakt door: {{ $team->user->name }}</p>
                                    </div>
                                    <a href="{{ route('teams.edit', $team->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                                        Bewerken
                                    </a>
                                </div>
                            </li>
                        @empty
                            <li class="text-gray-500 py-4">Er zijn nog geen teams aangemaakt.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Add Team Form -->
            <div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Team Aanmaken</h2>
                    <form method="POST" action="{{ route('teams.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Teamnaam</label>
                            <input type="text" id="name" name="name" placeholder="Bijv. Ajax Junioren"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   required>
                        </div>
                        <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg shadow-md transition duration-300">
                            Team Aanmaken
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer Button -->
        <div class="mt-12 flex justify-center">
            <a href="{{ route('user.addTeam') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white text-lg font-bold py-3 px-8 rounded-full shadow-lg transform transition duration-300 hover:scale-105">
                Voeg team aan tournament
            </a>
        </div>
    </div>
</x-base-layout>
