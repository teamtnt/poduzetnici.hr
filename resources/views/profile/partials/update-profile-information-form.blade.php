<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input-label for="firstname" :value="__('Ime')" />
                <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="given-name" />
                <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
            </div>
            <div>
                <x-input-label for="lastname" :value="__('Prezime')" />
                <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autocomplete="family-name" />
                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
            </div>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone" :value="__('Broj telefona')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="industry" :value="__('Djelatnost / Kategorija')" />
            <select id="industry" name="industry" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">
                <option value="">Odaberite djelatnost</option>
                @foreach (['IT / Programiranje', 'Dizajn', 'Marketing', 'Računovodstvo', 'Pravo', 'Građevina', 'Usluge čišćenja', 'Edukacija', 'Zdravlje i ljepota', 'Turizam i ugostiteljstvo', 'Prijevoz i logistika', 'Ostalo'] as $ind)
                    <option value="{{ $ind }}" {{ old('industry', $user->industry) === $ind ? 'selected' : '' }}>{{ $ind }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('industry')" />
        </div>

        <div>
            <x-input-label for="slug" :value="__('Korisničko ime (Slug)')" />
            <p class="text-xs text-gray-500 mb-1">Ovo će se koristiti za vašu javnu URL adresu (npr. poduzetnici.hr/profile/moj-slug)</p>
            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $user->slug)" />
            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Kratki opis')" />
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" rows="3">{{ old('description', $user->description) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Adresa')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="web" :value="__('Web stranica')" />
            <x-text-input id="web" name="web" type="url" class="mt-1 block w-full" :value="old('web', $user->web)" placeholder="https://..." />
            <x-input-error class="mt-2" :messages="$errors->get('web')" />
        </div>

        <div>
            <x-input-label for="preferred_contact_method" :value="__('Preferirani način kontakta')" />
            <select id="preferred_contact_method" name="preferred_contact_method" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">
                <option value="email" {{ old('preferred_contact_method', $user->preferred_contact_method) === 'email' ? 'selected' : '' }}>Email</option>
                <option value="phone" {{ old('preferred_contact_method', $user->preferred_contact_method) === 'phone' ? 'selected' : '' }}>Telefon</option>
                <option value="platform" {{ old('preferred_contact_method', $user->preferred_contact_method) === 'platform' ? 'selected' : '' }}>Platforma (Inbox)</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('preferred_contact_method')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
