<x-guest-layout>
 <!-- Login Form Section -->
 <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6 mt-16 border border-green-500">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-4">{{ __('Welcome Back!') }}</h2>
        <p class="text-sm text-gray-500 text-center mb-6">{{ __('Log in to your account') }}</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500"
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500"
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-green-600 hover:text-green-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="text-center mt-6 text-sm text-gray-500">
        {{ __('Don’t have an account?') }}
        <a href="{{ route('register') }}" class="text-green-600 hover:text-green-800 font-bold">
            {{ __('Sign up') }}
        </a>
    </div>
</x-guest-layout>
