<x-base-layout>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Team Bewerken: {{ $team->name }}</h1>


        <form action="{{ route('teams.update', $team) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="id" name="id" value="{{ $team->id }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                    disabled>
            </div>


            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                <input type="text" id="name" name="name" value="{{ $team->name }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                    required>
            </div>
            @if ($team->players)
            @php
            $players = implode(", ", json_decode($team->players, true));
            @endphp
            @endif

            <div>
                <label for="players" class="block text-sm font-medium text-gray-700">Spelers</label>
                <textarea id="players" name="players" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" placeholder="Er moet een komma tussen elke speler kommen">@if ($team->players){{ $players }}
                @endif</textarea>
            </div>

            <div>
                <label for="created_at" class="block text-sm font-medium text-gray-700">Gemaakt op</label>
                <input type="text" id="created_at" name="created_at" value="{{ $team->created_at }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                    disabled>
            </div>


            <div>
                <label for="updated_at" class="block text-sm font-medium text-gray-700">Bijgewerkt op</label>
                <input type="text" id="updated_at" name="updated_at" value="{{ $team->updated_at }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                    disabled>
            </div>

            <div class="flex justify-between w-72">
                <input type="submit" class="bg-blue-600 text-black px-4 py-2 rounded shadow hover:bg-blue-700" value="Opslaan">

                <a href="{{ route('teams.index') }}" class="text-blue-600 hover:text-blue-800">Terug naar teambeheer</a>
            </div>

        </form>

        <form action="{{route('teams.delete', $team)}}" method="post" class="mt-4">
            @csrf
            @method('DELETE')

            <input type="submit" value="Verwijder team" class="bg-red-600 text-black px-4 py-2 rounded shadow hover:bg-red-700">
        </form>

</x-base-layout>
