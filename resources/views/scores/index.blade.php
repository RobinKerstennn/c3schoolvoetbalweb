<x-base-layout>
    @foreach ($tournaments as $tournament)
        <a class="font-bold text-green-700 hover:text-green-900" href="{{ route('scores.only', $tournament) }}">
            <li
                class="border-2 border-green-500 rounded-lg p-4 mb-4 transform transition duration-300 hover:scale-110 hover:shadow-xl hover:bg-green-50">
                {{ $tournament->title }}
            </li>
        </a>
    @endforeach
</x-base-layout>
