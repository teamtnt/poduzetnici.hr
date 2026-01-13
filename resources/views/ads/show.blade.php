<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="inline-block px-3 py-1 text-sm font-semibold tracking-wide text-white {{ $ad->type === 'offer' ? 'bg-green-500' : 'bg-blue-500' }} rounded-full mb-4">
                                {{ $ad->type === 'offer' ? 'Nudim' : 'Tražim' }}
                            </span>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $ad->title }}</h1>
                            <div class="flex items-center mt-2 text-gray-600">
                                <span class="mr-4">{{ $ad->category }}</span>
                                <span>{{ $ad->created_at->format('d.m.Y H:i') }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                             <div class="text-3xl font-bold text-primary-600 mb-2">
                                {{ $ad->price ? '€' . number_format($ad->price, 2) : 'Na upit' }}
                            </div>
                        </div>
                    </div>

                    <div class="prose max-w-none mb-8">
                        {!! nl2br(e($ad->description)) !!}
                    </div>

                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-semibold mb-4">{{ __('Kontakt informacije') }}</h3>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-xl mr-4">
                                @if($ad->is_anonymous)
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                @else
                                    {{ substr($ad->user->firstname, 0, 1) }}{{ substr($ad->user->lastname, 0, 1) }}
                                @endif
                            </div>
                            <div>
                                <div class="font-bold">
                                    @if($ad->is_anonymous)
                                        {{ __('Anonimni oglašivač') }}
                                    @else
                                        {{ $ad->user->firstname }} {{ $ad->user->lastname }}
                                    @endif
                                </div>
                                
                                @if(!$ad->is_anonymous && $ad->user->company_name)
                                    <div class="text-sm text-gray-600">{{ $ad->user->company_name }}</div>
                                @endif

                                <div class="mt-1 text-primary-600 font-medium">
                                    @if($ad->user->preferred_contact_method === 'phone' && $ad->user->phone)
                                        <a href="tel:{{ $ad->user->phone }}" class="flex items-center hover:underline">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                            {{ $ad->user->phone }}
                                        </a>
                                    @elseif($ad->user->preferred_contact_method === 'platform')
                                        <span class="flex items-center text-gray-600 bg-gray-100 px-3 py-1 rounded-full text-xs">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                            {{ __('Kontaktirajte putem platforme') }}
                                        </span>
                                    @else
                                         <a href="mailto:{{ $ad->user->email }}" class="flex items-center hover:underline">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            {{ $ad->user->email }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
