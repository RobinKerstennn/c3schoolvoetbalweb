<x-base-layout>
    <table class="border-2">
        <thead>
            <th>TOURNAMENT ID</th>
            <th>GAMES</th>
            <th>SCORES</th>
            <th>ACTIES</th>
        </thead>
        <tbody class="border-2">
            @foreach ($games as $game)
                <tr>
                    <td>{{$game->tournament_id}}</td>
                    <td>{{$game->team_1}} vs {{$game->team_2}}</td>
                    <td>{{$game->team_1_score}} - {{$game->team_2_score}}</td>
                    <td class="">
                        <a href="#">EDIT</a>
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="sumbit" value="DELETE">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-base-layout>
