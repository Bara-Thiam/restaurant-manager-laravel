<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Commande #{{ $commande->id }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto px-4">
        <p><strong>Table :</strong> {{ $commande->table->numero }}</p>
        <p><strong>Statut :</strong> {{ $commande->statut }}</p>

        <table class="mt-4 w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Plat</th>
                    <th class="p-2 text-left">Qté</th>
                    <th class="p-2 text-left">Prix unitaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->plats as $plat)
                <tr class="border-t">
                    <td class="p-2">{{ $plat->nom }}</td>
                    <td class="p-2">{{ $plat->pivot->quantite }}</td>
                    <td class="p-2">{{ $plat->prix }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('commandes.ticket', $commande) }}" 
               class="bg-green-600 text-white px-4 py-2 rounded">
                Voir le ticket
            </a>
        </div>
    </div>
</x-app-layout>