<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-center mb-6">
                <a href="{{ route('home') }}" class="text-3xl font-bold font-display text-dark-900 tracking-tight">
                    Poduzetnici<span class="text-primary-500">.hr</span>
                </a>
            </div>
            <h2 class="mt-6 text-center text-3xl font-bold font-display text-dark-900">
                Kreirajte novi račun
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Već imate račun? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500">Prijavite se</a>.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl shadow-gray-100 sm:rounded-2xl sm:px-10 border border-gray-100">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Ime i prezime')" />
                        <div class="mt-1">
                            <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email adresa')" />
                        <div class="mt-1">
                            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Lozinka')" />
                        <div class="mt-1">
                            <x-text-input id="password" class="block w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Potvrdite lozinku')" />
                        <div class="mt-1">
                            <x-text-input id="password_confirmation" class="block w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <x-primary-button class="w-full flex justify-center">
                            {{ __('Registriraj se') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
