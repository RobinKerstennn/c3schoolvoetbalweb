<x-guest-layout>
    <!-- Registration Form Section -->
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6 mt-16 border border-green-500">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-4">{{ __('Create Your Account') }}</h2>
        <p class="text-sm text-gray-500 text-center mb-6">
            {{ __('Join us today! Fill in your details to get started.') }}</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name"
                    class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500" type="text"
                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500" type="email"
                    name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password"
                    class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <!-- Register Button and Redirect -->
            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-green-600 hover:text-green-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="text-center mt-6 text-sm text-gray-500">
        {{ __('By signing up, you agree to our') }}
        <a href="#" class="text-green-600 hover:text-green-800 font-bold">
            {{ __('Terms & Conditions') }}
        </a>.
    </div>
</x-guest-layout>