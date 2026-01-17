<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Oglasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="mb-6">
                {{-- Add filters here later if needed --}}
                <a href="{{ route('ads.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-500 focus:bg-primary-500 active:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Predaj novi oglas') }}
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($ads as $ad)
                <a href="{{ route('ads.show', $ad->id) }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white {{ $ad->type === 'offer' ? 'bg-green-500' : 'bg-blue-500' }} rounded-full mb-2">
                                {{ $ad->type === 'offer' ? 'Nudim' : 'Tražim' }}
                            </span>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $ad->title }}</h5>
                        </div>
                        <span class="text-sm text-gray-500">{{ $ad->created_at->format('d.m.Y') }}</span>
                    </div>
                    <p class="font-normal text-gray-700 line-clamp-3 mb-4">{{ $ad->description }}</p>
                    <div class="flex justify-between items-center mt-4">
                         <span class="font-bold text-lg">{{ $ad->price ? '€' . number_format($ad->price, 2) : 'Na upit' }}</span>
                         <div class="flex flex-col items-end">
                             <span class="text-sm text-gray-600">{{ $ad->category }}</span>
                             @if($ad->location)
                                 <span class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                                     <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                     {{ $ad->location }}
                                 </span>
                             @endif
                         </div>
                    </div>
                </a>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500 bg-white rounded-lg shadow">
                        {{ __('Nema oglasa koji odgovaraju vašim kriterijima.') }}
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $ads->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
