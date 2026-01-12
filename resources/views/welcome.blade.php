<x-app-layout>
    <!-- Hero Section with Dark Gradient -->
    <div class="relative bg-dark-900 overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-10" src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-b from-dark-900/0 to-dark-900"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl mb-6">
                Vaša mreža za <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-blue-500">poslovni uspjeh</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300">
                Povežite se s tisućama hrvatskih poduzetnika. Pronađite partnere, klijente i resurse na jednom mjestu.
            </p>
            <div class="mt-10 max-w-xl mx-auto">
                <div class="relative rounded-full shadow-sm">
                    <input type="text" class="block w-full rounded-full border-0 py-4 pl-6 pr-32 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-primary-500 shadow-xl" placeholder="Što tražite danas?">
                    <div class="absolute inset-y-1 right-1 flex items-center">
                        <button class="h-full rounded-full border-transparent bg-dark-800 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            Pretraži
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Cards (Floating) -->
    <div class="relative -mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-white border border-gray-100 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all group text-center">
                <div class="text-primary-600 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>
                <h3 class="text-dark-900 font-bold">IT & Razvoj</h3>
            </a>
            <a href="#" class="bg-white border border-gray-100 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all group text-center">
                <div class="text-purple-600 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                </div>
                <h3 class="text-dark-900 font-bold">Marketing</h3>
            </a>
            <a href="#" class="bg-white border border-gray-100 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all group text-center">
                <div class="text-green-600 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-dark-900 font-bold">Financije</h3>
            </a>
            <a href="#" class="bg-white border border-gray-100 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all group text-center">
                <div class="text-orange-600 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-dark-900 font-bold">Usluge</h3>
            </a>
        </div>
    </div>

    <!-- Latest Ads -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl font-bold font-display text-dark-900">Najnovije prilike</h2>
                <p class="text-gray-500 mt-2">Pregledajte najnovije oglase iz naše zajednice</p>
            </div>
            <a href="{{ route('ads.index') }}" class="text-primary-600 font-semibold hover:text-primary-700 flex items-center">
                Pogledaj sve <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <a href="{{ route('ads.show', 1) }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden block">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur text-dark-900 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Nudim</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">IT & Razvoj</span>
                        <span class="text-xs text-gray-400">2h</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-900 mb-2 group-hover:text-primary-600 transition-colors">Izrada web shopova</h3>
                    <p class="text-gray-500 text-sm line-clamp-2 mb-4">Kompletna izrada web trgovina na WordPress platformi. Ključ u ruke.</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-dark-800 text-white flex items-center justify-center text-xs font-bold">MW</div>
                            <span class="ml-2 text-sm font-medium text-gray-700">Marko Web</span>
                        </div>
                        <span class="text-lg font-bold text-dark-900">1.200 €</span>
                    </div>
                </div>
            </a>

             <!-- Card 2 -->
             <a href="{{ route('ads.show', 2) }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden block">
                <div class="relative h-48 overflow-hidden bg-dark-800 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <div class="absolute top-4 left-4">
                        <span class="bg-dark-900/90 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">Tražim</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-semibold text-purple-600 uppercase tracking-wider">Nekretnine</span>
                        <span class="text-xs text-gray-400">5h</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-900 mb-2 group-hover:text-primary-600 transition-colors">Uredski prostor Centar</h3>
                    <p class="text-gray-500 text-sm line-clamp-2 mb-4">Tražim uredski prostor od cca 50m2 u širem centru Zagreba.</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center text-xs font-bold">AB</div>
                            <span class="ml-2 text-sm font-medium text-gray-700">Ana B.</span>
                        </div>
                        <span class="text-lg font-bold text-dark-900">do 800 €</span>
                    </div>
                </div>
            </a>

            <!-- Card 3 -->
            <a href="{{ route('ads.show', 3) }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden block">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur text-dark-900 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Nudim</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-semibold text-green-600 uppercase tracking-wider">Financije</span>
                        <span class="text-xs text-gray-400">1d</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-900 mb-2 group-hover:text-primary-600 transition-colors">Računovodstvene usluge</h3>
                    <p class="text-gray-500 text-sm line-clamp-2 mb-4">Povoljno i stručno vođenje poslovnih knjiga za paušalne obrte i d.o.o.</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-xs font-bold">RK</div>
                            <span class="ml-2 text-sm font-medium text-gray-700">Računovodstvo K.</span>
                        </div>
                        <span class="text-lg font-bold text-dark-900">100 €/mj</span>
                    </div>
                </div>
            </a>

            <!-- Card 4 -->
            <a href="{{ route('ads.show', 4) }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden block">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-dark-900/90 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">Tražim</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-semibold text-orange-600 uppercase tracking-wider">Usluge</span>
                        <span class="text-xs text-gray-400">2d</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-900 mb-2 group-hover:text-primary-600 transition-colors">Partner za EU projekte</h3>
                    <p class="text-gray-500 text-sm line-clamp-2 mb-4">Tražimo iskusnog konzultanta za pisanje i provedbu EU projekata za proizvodnu tvrtku.</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center text-xs font-bold">PT</div>
                            <span class="ml-2 text-sm font-medium text-gray-700">Proizvodnja T.</span>
                        </div>
                        <span class="text-lg font-bold text-dark-900">Po dogovoru</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
