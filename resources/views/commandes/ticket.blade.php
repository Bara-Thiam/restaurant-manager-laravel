<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Ticket de caisse #{{ $commande->id }}</h2>
    </x-slot>

    <div class="py-6 max-w-lg mx-auto px-4">
        <div class="border rounded p-6 shadow">
            {{-- En-tête --}}
            <h1 class="text-2xl font-bold text-center mb-1">Restaurant</h1>
            <p class="text-center text-gray-500 mb-4">{{ now()->format('d/m/Y H:i') }}</p>
            <hr>

            {{-- Infos commande --}}
            <p class="mt-3"><strong>Table :</strong> {{ $commande->table->numero }}</p>
            <p><strong>Serveur :</strong> {{ $commande->user->name }}</p>
            <hr class="my-3">

            {{-- Plats --}}
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-1">Plat</th>
                        <th class="text-center py-1">Qté</th>
                        <th class="text-right py-1">Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($commande->plats as $plat)
                        @php $sousTotal = $plat->prix * $plat->pivot->quantite; $total += $sousTotal; @endphp
                        <tr class="border-b">
                            <td class="py-1">{{ $plat->nom }}</td>
                            <td class="text-center py-1">{{ $plat->pivot->quantite }}</td>
                            <td class="text-right py-1">{{ number_format($sousTotal, 0, ',', ' ') }} FCFA</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total --}}
            <div class="mt-4 text-right text-lg font-bold">
                TOTAL : {{ number_format($total, 0, ',', ' ') }} FCFA
            </div>

            {{-- Bouton imprimer --}}
            <div class="mt-6 text-center print:hidden">
                <button onclick="window.print()" 
                        class="bg-green-600 text-white px-6 py-2 rounded">
                    Imprimer
                </button>
            </div>
        </div>
    </div>
</x-app-layout>