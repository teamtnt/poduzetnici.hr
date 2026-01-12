<x-app-layout>
    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-500">
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <a href="{{ route('ads.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Oglasi</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">IT & Razvoj</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            
            <!-- Left Column: Ad Details -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-100">
                    <!-- Image Gallery -->
                    <div class="relative h-96 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover" alt="Main image">
                        <div class="absolute bottom-4 left-4 flex space-x-2">
                            <button class="w-20 h-16 border-2 border-primary-500 rounded-lg overflow-hidden shadow-lg">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                            </button>
                            <button class="w-20 h-16 border-2 border-white rounded-lg overflow-hidden opacity-70 hover:opacity-100 shadow-lg transition-opacity">
                                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                            </button>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h1 class="text-3xl font-bold font-display text-dark-900 mb-2">Izrada web shopova (WooCommerce)</h1>
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Zagreb
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Objavljeno prije 2 sata
                                    </span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-primary-50 text-primary-700">
                                        Nudim
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold font-display text-dark-900">1.200 €</div>
                                <div class="text-sm text-gray-500">fiksna cijena</div>
                            </div>
                        </div>

                        <div class="prose max-w-none text-gray-700 mt-8">
                            <p>Nudimo kompletnu izradu web trgovina na WordPress platformi (WooCommerce). Idealno za male i srednje poduzetnike koji žele započeti online prodaju.</p>
                            
                            <h3 class="font-bold text-lg mt-4 mb-2">Što je uključeno u cijenu?</h3>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Instalacija i konfiguracija WordPressa i WooCommerca</li>
                                <li>Premium tema po izboru</li>
                                <li>Unos do 50 proizvoda</li>
                                <li>Postavljanje načina plaćanja (kartice, pouzeće, transakcijski)</li>
                                <li>Osnovna SEO optimizacija</li>
                                <li>Edukacija za samostalno vođenje (2h)</li>
                            </ul>

                            <p class="mt-4">Rok isporuke je 10 radnih dana od dostave svih materijala. Izdajemo R1 račun.</p>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-between items-center">
                        <div class="text-sm text-gray-500">ID Oglasa: #12345</div>
                        <button class="text-sm text-red-600 hover:text-red-800 font-medium">Prijavi oglas</button>
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact & User Info -->
            <div class="lg:col-span-1 mt-8 lg:mt-0">
                <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 sticky top-24">
                    <div class="flex items-center mb-6">
                        <div class="h-12 w-12 rounded-full bg-dark-800 flex items-center justify-center text-xl font-bold text-white">MW</div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-dark-900">Marko Web</h3>
                            <p class="text-sm text-gray-500">Član od 2023.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-primary-50 border border-primary-100 rounded-xl p-5">
                            <h4 class="text-sm font-bold text-primary-900 mb-2">Kontaktirajte oglašivača</h4>
                            <p class="text-xs text-primary-700 mb-4">Morate biti prijavljeni da biste poslali poruku.</p>
                            
                            <!-- If Logged In -->
                            <button class="w-full bg-primary-600 text-white rounded-lg py-2.5 text-sm font-bold hover:bg-primary-500 transition-colors shadow-lg shadow-primary-500/30 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Pošalji poruku
                            </button>
                        </div>

                        <div class="border-t border-gray-100 pt-4">
                            <h4 class="text-sm font-bold text-dark-900 mb-2">Sigurnosni savjeti</h4>
                            <ul class="text-xs text-gray-500 space-y-2">
                                <li>• Nikada ne uplaćujte novac unaprijed.</li>
                                <li>• Provjerite tvrtku u sudskom registru.</li>
                                <li>• Sva komunikacija neka ide preko platforme.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
