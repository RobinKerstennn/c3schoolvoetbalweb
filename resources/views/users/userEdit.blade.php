<x-base-layout>
    <div class="w-4/5 mx-auto">
        <h1 class="font-bold text-3xl mb-10">Edit user</h1>
        <form action="{{route('users.update', $user )}}" method="post" class="border-2 p-6 shadow-lg">
            @csrf
            @method('PUT')

            <div class="flex flex-col mb-10">
                <label for="name">Gebruikersnaam</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" readonly>
            </div>

            <div class="flex flex-col mb-10">
                <label for="email">Gebruikers email</label>
                <input type="email" name="email" id="email" value="{{$user->email}}" readonly>
            </div>

            <div class="flex flex-col space-y-4">
                <label for="role" class="text-lg font-semibold text-gray-700">Gebruikers role</label>

                <div class="flex space-x-6">
                    <!-- User Role Radio Button -->
                    <div class="flex items-center space-x-2">
                        <input type="radio" name="role" id="role_user" value="user"
                            class="form-radio h-5 w-5 text-blue-600"
                            @if($user->role == 'user') checked @endif>
                        <label for="role_user" class="text-gray-700 font-medium">User</label>
                    </div>

                    <!-- Referee Role Radio Button -->
                    <div class="flex items-center space-x-2">
                        <input type="radio" name="role" id="role_referee" value="referee"
                            class="form-radio h-5 w-5 text-green-600"
                            @if($user->role == 'referee') checked @endif>
                        <label for="role_referee" class="text-gray-700 font-medium">Referee</label>
                    </div>

                    <!-- Admin Role Radio Button -->
                    <div class="flex items-center space-x-2">
                        <input type="radio" name="role" id="role_admin" value="admin"
                            class="form-radio h-5 w-5 text-red-600"
                            @if($user->role == 'admin') checked @endif>
                        <label for="role_admin" class="text-gray-700 font-medium">Admin</label>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-10">
                <label for="teams" class="text-lg font-semibold text-gray-700">Gebruikers team(s)</label>
                @foreach ($user->team as $team)
                    <li>{{ $team->name }}</li>
                @endforeach
            </div>

            <div class="mt-6">
                <input type="submit" value="Edit gebruiker" class="border-2 bg-blue-600 rounded-lg p-2 w-32">
            </div>
        </form>
    </div>
</x-base-layout>
