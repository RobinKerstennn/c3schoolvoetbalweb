<x-base-layout>
    <table class="border-2">
        <thead>
            <th>TOURNAMENT ID</th>
            <th>NAAM</th>
            <th>ACTIES</th>
        </thead>
        <tbody class="border-2">
            @foreach ($tournaments as $tournament)
                <tr>
                    <td>{{$tournament->id}}</td>
                    <td>{{$tournament->name}}</td>
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
