<x-base-layout>
    @foreach ($tournaments as $tournament)
    <li class="border-2 rounded-lg p-4 mb-4 transform transition duration-300 hover:scale-110 hover:shadow-xl">
        <a class="font-bold" href="{{route('wedstrijdschema.tournaments.view', $tournament)}}">{{$tournament->title}}</a>
    </li>
    @endforeach
</x-base-layout>
