<x-app-layout>
    <div class="bg-gray-100 min-h-screen">
        <!-- Hero Header -->
        <div class="bg-primary-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-3xl font-bold mb-2">Baza Poduzetnika</h1>
                <p class="text-primary-100">Pronađite poslovne partnere, stručnjake i tvrtke iz raznih industrija</p>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="bg-amber-400">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <form method="GET" action="{{ route('profiles.index') }}" class="flex flex-col md:flex-row gap-2">
                    <div class="flex-1">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                placeholder="Naziv tvrtke, ime ili ključna riječ..." 
                                class="w-full pl-10 pr-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-primary-500 text-gray-900">
                        </div>
                    </div>
                    <div class="md:w-64">
                        <select name="industry" class="w-full py-3 px-4 rounded-lg border-0 focus:ring-2 focus:ring-primary-500 text-gray-900">
                            <option value="">Sve djelatnosti</option>
                            @foreach($industries as $industry)
                                <option value="{{ $industry }}" {{ request('industry') == $industry ? 'selected' : '' }}>
                                    {{ $industry }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors">
                        Traži
                    </button>
                </form>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Results Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <p class="text-gray-700">
                        @if(request('search') || request('industry'))
                            <span class="font-semibold">{{ $users->total() }}</span> rezultata
                            @if(request('industry'))
                                u kategoriji <span class="font-semibold">{{ request('industry') }}</span>
                            @endif
                            @if(request('search'))
                                za "<span class="font-semibold">{{ request('search') }}</span>"
                            @endif
                        @else
                            <span class="font-semibold">{{ $users->total() }}</span> poduzetnika u bazi
                        @endif
                    </p>
                </div>
                @if(request('search') || request('industry'))
                    <a href="{{ route('profiles.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                        ✕ Očisti filtere
                    </a>
                @endif
            </div>

            <!-- Results List -->
            @if($users->count() > 0)
                <div class="space-y-4">
                    @foreach($users as $user)
                        <a href="{{ route('profile.show', $user->slug) }}" class="block bg-white rounded-xl border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-200 overflow-hidden group">
                            <div class="flex flex-col md:flex-row">
                                <!-- Left: Avatar/Image Section -->
                                <div class="md:w-64 lg:w-72 flex-shrink-0 bg-gray-50 p-6 flex items-center justify-center">
                                    <div class="w-24 h-24 md:w-32 md:h-32 rounded-2xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center overflow-hidden border-2 border-white shadow-sm">
                                        @if($user->avatar)
                                            <img src="{{ Str::startsWith($user->avatar, 'http') ? $user->avatar : asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="text-4xl md:text-5xl font-bold text-primary-300">
                                                {{ strtoupper(substr($user->company_name ?: $user->firstname, 0, 1)) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Right: Content Section -->
                                <div class="flex-1 p-6">
                                    <div class="flex flex-col lg:flex-row lg:justify-between gap-4">
                                        <!-- Main Info -->
                                        <div class="flex-1">
                                            <div class="flex items-start gap-3 mb-2">
                                                <h2 class="text-xl font-bold text-primary-700 group-hover:text-primary-600 transition-colors">
                                                    {{ $user->company_name ?: $user->firstname . ' ' . $user->lastname }}
                                                </h2>
                                                @if($user->account_type === 'company')
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-700 flex-shrink-0">
                                                        Tvrtka
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <!-- Location -->
                                            @if($user->address)
                                                <div class="flex items-center gap-1.5 text-sm text-gray-500 mb-3">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                    {{ $user->address }}
                                                </div>
                                            @endif

                                            <!-- Tags/Industry -->
                                            <div class="flex flex-wrap gap-2 mb-3">
                                                @if($user->industry)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary-50 text-primary-700 border border-primary-100">
                                                        {{ $user->industry }}
                                                    </span>
                                                @endif
                                                @if($user->web)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                                        Web stranica
                                                    </span>
                                                @endif
                                                @if($user->phone)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                                        Dostupan
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Description -->
                                            @if($user->description)
                                                <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed">
                                                    {{ $user->description }}
                                                </p>
                                            @endif
                                        </div>

                                        <!-- Right Side: CTA -->
                                        <div class="lg:w-48 flex flex-col items-start lg:items-end justify-between gap-3 lg:text-right">
                                            <!-- Contact Badge -->
                                            <div class="flex items-center gap-2">
                                                @if($user->preferred_contact_method === 'email')
                                                    <span class="text-xs text-gray-500">Kontakt putem emaila</span>
                                                @elseif($user->preferred_contact_method === 'phone')
                                                    <span class="text-xs text-gray-500">Kontakt telefonom</span>
                                                @else
                                                    <span class="text-xs text-gray-500">Kontakt putem platforme</span>
                                                @endif
                                            </div>

                                            <!-- CTA Button -->
                                            <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-lg group-hover:bg-primary-700 transition-colors">
                                                Pogledaj profil
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </span>

                                            <!-- Member since -->
                                            <span class="text-xs text-gray-400">
                                                Član od {{ $user->created_at->format('M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $users->withQueryString()->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl border border-gray-200 p-12 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Nema pronađenih poduzetnika</h3>
                    <p class="text-gray-500 mb-6">Pokušajte prilagoditi filtere ili pretragu.</p>
                    <a href="{{ route('profiles.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                        Prikaži sve poduzetnike
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
