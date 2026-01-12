<x-app-layout>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            
            <!-- Sidebar Filters -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 sticky top-24">
                    <h3 class="font-bold font-display text-dark-900 mb-4">Filtriraj oglase</h3>
                    
                    <!-- Search -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pretraga</label>
                        <input type="text" placeholder="Ključna riječ..." class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary-500 focus:ring-primary-500 text-sm p-2.5 border transition-colors">
                    </div>

                    <!-- Type -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tip oglasa</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-600">Nudim</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-600">Tražim</span>
                            </label>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategorija</label>
                        <select class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary-500 focus:ring-primary-500 text-sm p-2.5 border transition-colors">
                            <option>Sve kategorije</option>
                            <option>IT & Razvoj</option>
                            <option>Marketing</option>
                            <option>Računovodstvo</option>
                            <option>Nekretnine</option>
                        </select>
                    </div>

                    <!-- Location -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokacija</label>
                        <input type="text" placeholder="Grad ili županija" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary-500 focus:ring-primary-500 text-sm p-2.5 border transition-colors">
                    </div>

                    <button class="w-full bg-dark-900 text-white rounded-lg py-2.5 text-sm font-bold hover:bg-dark-800 transition-colors shadow-lg shadow-dark-900/20">
                        Primijeni filtere
                    </button>
                </div>
            </div>

            <!-- Ads Grid -->
            <div class="flex-1">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold font-display text-dark-900">Svi oglasi</h1>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Sortiraj po:</span>
                        <select class="text-sm border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2 border bg-white">
                            <option>Najnovije</option>
                            <option>Cijena: Najniža</option>
                            <option>Cijena: Najviša</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <!-- Horizontal Ad Card 1 -->
                    <a href="{{ route('ads.show', 1) }}" class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-gray-100 p-5 flex flex-col sm:flex-row gap-5 group">
                        <div class="w-full sm:w-48 h-32 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Ad image">
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg font-bold text-dark-900 group-hover:text-primary-600 transition-colors">Izrada web shopova (WooCommerce)</h3>
                                    <span class="font-bold text-dark-900 whitespace-nowrap ml-4">1.200 €</span>
                                </div>
                                <div class="flex items-center space-x-2 mt-1 mb-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-primary-50 text-primary-700">Nudim</span>
                                    <span class="text-xs text-gray-500 font-medium">• IT & Razvoj</span>
                                    <span class="text-xs text-gray-500 font-medium">• Zagreb</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    Nudimo kompletnu izradu web trgovina na WordPress platformi. Ključ u ruke, edukacija uključena. SEO optimizacija i brza isporuka.
                                </p>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center">
                                    <div class="h-6 w-6 rounded-full bg-dark-800 flex items-center justify-center text-xs font-bold text-white">MW</div>
                                    <span class="text-xs font-medium text-gray-700 ml-2">Marko Web</span>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="text-xs text-gray-500">Prije 2 sata</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Horizontal Ad Card 2 -->
                    <a href="{{ route('ads.show', 2) }}" class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-gray-100 p-5 flex flex-col sm:flex-row gap-5 group">
                        <div class="w-full sm:w-48 h-32 bg-dark-800 rounded-xl flex-shrink-0 flex items-center justify-center text-gray-600">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg font-bold text-dark-900 group-hover:text-primary-600 transition-colors">Knjigovodstveni servis za d.o.o.</h3>
                                    <span class="font-bold text-dark-900 whitespace-nowrap ml-4">Po dogovoru</span>
                                </div>
                                <div class="flex items-center space-x-2 mt-1 mb-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-purple-50 text-purple-700">Tražim</span>
                                    <span class="text-xs text-gray-500 font-medium">• Računovodstvo</span>
                                    <span class="text-xs text-gray-500 font-medium">• Split</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    Tražimo pouzdan knjigovodstveni servis za novoosnovani d.o.o. u Splitu. Očekujemo digitalno poslovanje i savjetovanje.
                                </p>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center">
                                    <div class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-700">T</div>
                                    <span class="text-xs font-medium text-gray-700 ml-2">Tech Start</span>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="text-xs text-gray-500">Danas</span>
                                </div>
                            </div>
                        </div>
                    </a>

                     <!-- Horizontal Ad Card 3 -->
                     <a href="{{ route('ads.show', 3) }}" class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-gray-100 p-5 flex flex-col sm:flex-row gap-5 group">
                        <div class="w-full sm:w-48 h-32 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Ad image">
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg font-bold text-dark-900 group-hover:text-primary-600 transition-colors">Uredski prostor 50m2 - Centar</h3>
                                    <span class="font-bold text-dark-900 whitespace-nowrap ml-4">600 €/mj</span>
                                </div>
                                <div class="flex items-center space-x-2 mt-1 mb-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-primary-50 text-primary-700">Nudim</span>
                                    <span class="text-xs text-gray-500 font-medium">• Nekretnine</span>
                                    <span class="text-xs text-gray-500 font-medium">• Rijeka</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    Iznajmljujem uređen uredski prostor u centru Rijeke. 2 sobe, čajna kuhinja, sanitarni čvor. Dostupno odmah.
                                </p>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center">
                                    <div class="h-6 w-6 rounded-full bg-orange-100 flex items-center justify-center text-xs font-bold text-orange-700">N</div>
                                    <span class="text-xs font-medium text-gray-700 ml-2">Nekretnine d.o.o.</span>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="text-xs text-gray-500">Jučer</span>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Prethodna</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-primary-50 border-primary-500 text-primary-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Sljedeća</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
