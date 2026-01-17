<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="mb-8 text-center">
                        <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-blue-600">
                            Predaj novi oglas
                        </h1>
                        <p class="text-gray-500 mt-2">Ispunite obrazac ispod kako biste objavili svoju ponudu ili potražnju.</p>
                    </div>

                    <form method="POST" action="{{ route('ads.store') }}" class="space-y-8">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Naslov oglasa')" class="text-lg font-semibold text-gray-700" />
                            <x-text-input id="title" class="block mt-2 w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50" type="text" name="title" :value="old('title')" placeholder="npr. Prodajem uhodan posao u centru" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                             <!-- Type -->
                            <div>
                                <span class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Tip oglasa') }}</span>
                                <div class="flex space-x-4">
                                    <label class="flex-1 relative cursor-pointer group">
                                        <input type="radio" name="type" value="offer" class="peer sr-only" checked>
                                        <div class="p-4 rounded-xl border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 hover:bg-gray-50 transition-all text-center">
                                            <span class="block font-bold text-gray-900 peer-checked:text-primary-700">Nudim</span>
                                        </div>
                                    </label>
                                    <label class="flex-1 relative cursor-pointer group">
                                        <input type="radio" name="type" value="demand" class="peer sr-only">
                                        <div class="p-4 rounded-xl border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 hover:bg-gray-50 transition-all text-center">
                                            <span class="block font-bold text-gray-900 peer-checked:text-primary-700">Tražim</span>
                                        </div>
                                    </label>
                                </div>
                                 <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                             <!-- Category -->
                            <div>
                                <x-input-label for="category" :value="__('Kategorija')" class="text-lg font-semibold text-gray-700" />
                                <div class="relative mt-2">
                                    <select id="category" name="category" class="block w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50 appearance-none">
                                        <option value="Prodaja poslovanja">Prodaja poslovanja</option>
                                        <option value="Partnerstva">Partnerstva</option>
                                        <option value="Oprema i alati">Oprema i alati</option>
                                        <option value="Usluge">Usluge</option>
                                        <option value="Oglasni prostor">Oglasni prostor</option>
                                        <option value="Pitanja i odgovori">Pitanja i odgovori</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                            
                            <!-- Location -->
                            <div>
                                <x-input-label for="location" :value="__('Lokacija')" class="text-lg font-semibold text-gray-700" />
                                <x-text-input 
                                    id="location" 
                                    class="block mt-2 w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50" 
                                    type="text" 
                                    name="location" 
                                    :value="old('location')" 
                                    placeholder="npr. Zagreb, Split..." 
                                    required 
                                />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Price -->
                            <div x-data="{ priceOnRequest: false }">
                                <div class="flex justify-between items-center mb-2">
                                    <x-input-label for="price" :value="__('Cijena (€)')" class="text-lg font-semibold text-gray-700" />
                                    
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" x-model="priceOnRequest" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-600 font-medium">Cijena na upit</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <x-text-input 
                                        id="price" 
                                        class="block w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50 transition-colors disabled:opacity-50 disabled:bg-gray-100 disabled:cursor-not-allowed" 
                                        type="number" 
                                        step="0.01" 
                                        name="price" 
                                        :value="old('price')" 
                                        placeholder="0.00"
                                        ::disabled="priceOnRequest"
                                        ::value="priceOnRequest ? '' : $el.value"
                                    />
                                </div>
                                <p class="text-xs text-gray-500 mt-2 ml-1" x-show="!priceOnRequest">Unesite iznos u eurima.</p>
                                <p class="text-xs text-primary-600 mt-2 ml-1 font-medium" x-show="priceOnRequest" style="display: none;">Kupci će vas kontaktirati za cijenu.</p>
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                             <!-- Duration -->
                             <div>
                                <x-input-label for="duration_days" :value="__('Trajanje oglasa')" class="text-lg font-semibold text-gray-700" />
                                <div class="relative mt-2">
                                    <select id="duration_days" name="duration_days" class="block w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50 appearance-none">
                                        <option value="7">7 dana</option>
                                        <option value="14">14 dana</option>
                                        <option value="30">30 dana</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('duration_days')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Detaljan opis')" class="text-lg font-semibold text-gray-700" />
                            <textarea id="description" name="description" rows="8" class="block mt-2 w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50" placeholder="Opišite detaljno što nudite ili tražite..." required>{{ old('description') }}</textarea>
                            <p class="mt-2 text-sm text-gray-500">
                                Podržan je <a href="https://www.markdownguide.org/basic-syntax/" target="_blank" class="text-primary-600 hover:text-primary-700 underline">Markdown format</a> za stiliziranje teksta (podebljano, liste, itd.).
                            </p>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Anonymous Option -->
                        <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                            <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300 rounded transition duration-150 ease-in-out">
                            <div class="ml-3">
                                <label for="is_anonymous" class="font-medium text-gray-900 cursor-pointer">Objavi anonimno</label>
                                <p class="text-sm text-gray-500">Vaše ime i prezime neće biti vidljivo javnosti. Korisnici će vas moći kontaktirati samo putem platforme ako ne ostavite druge podatke.</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                            <x-primary-button class="px-8 py-3 text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                                {{ __('Objavi oglas') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
