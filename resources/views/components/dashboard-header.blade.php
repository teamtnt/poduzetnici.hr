<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold font-display text-dark-900">
            {{ $title ?? 'Dashboard' }}
        </h1>
        <p class="text-gray-500 mt-1">{{ $subtitle ?? 'Upravljajte svojim oglasima i postavkama.' }}</p>
    </div>
    
    <div class="bg-white p-1 rounded-xl shadow-sm border border-gray-200 inline-flex">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg text-sm transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-primary-50 text-primary-600 font-semibold shadow-sm' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
            Pregled
        </a>
        <a href="{{ route('profile.edit') }}" class="px-4 py-2 rounded-lg text-sm transition-all duration-200 flex items-center gap-2 {{ request()->routeIs('profile.edit') ? 'bg-primary-50 text-primary-600 font-semibold shadow-sm' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
            <span>Moj Profil</span>
             @if(!auth()->user()->slug && !request()->routeIs('profile.edit'))
                 <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                 </span>
            @endif
        </a>
        @if(auth()->user()->slug)
        <a href="{{ route('profile.show', auth()->user()->slug) }}" target="_blank" class="ml-2 px-4 py-2 rounded-lg text-sm text-gray-500 hover:text-primary-600 hover:bg-gray-50 transition-all duration-200 flex items-center gap-1 border-l border-gray-100">
            <span>Javni profil</span>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
        </a>
        @endif
    </div>
</div>
