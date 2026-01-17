<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-2xl">
            <div class="text-center mb-6">
                <a href="{{ route('home') }}" class="text-3xl font-bold font-display text-dark-900 tracking-tight">
                    Poduzetnici<span class="text-primary-500">.hr</span>
                </a>
            </div>

            <h1 class="text-center text-3xl font-bold font-display text-dark-900">
                Zahtjev za brisanje korisničkih podataka
            </h1>

            <div class="mt-6 bg-white py-8 px-6 shadow-xl shadow-gray-100 sm:rounded-2xl sm:px-10 border border-gray-100">
                <div class="space-y-4 text-sm text-gray-700">
                    <p>
                        Ako želite zatražiti brisanje svojih podataka povezanih s prijavom putem Facebooka,
                        pošaljite nam zahtjev s e-mail adrese povezane s vašim računom.
                    </p>
                    <p>
                        U e-mailu navedite:
                    </p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Ime i prezime</li>
                        <li>E-mail adresu računa</li>
                        <li>Napomenu da tražite brisanje podataka</li>
                    </ul>
                    <p>
                        Zahtjev pošaljite na:
                        <a href="mailto:podrska@poduzetnici.hr" class="font-medium text-primary-600 hover:text-primary-500">
                            podrska@poduzetnici.hr
                        </a>
                    </p>
                    <p>
                        Nakon zaprimanja zahtjeva, brisanje će biti izvršeno u najkraćem mogućem roku.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
