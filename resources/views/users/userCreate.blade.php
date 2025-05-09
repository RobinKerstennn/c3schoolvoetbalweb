<x-base-layout>
    <table class="border-2">
        <thead>
            <th>NAAM</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ACTIES</th>
        </thead>
        <tbody class="border-2">
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
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
