<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Commandes</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4">
        <a href="{{ route('commandes.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Nouvelle commande
        </a>

        <table class="mt-6 w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">N°</th>
                    <th class="p-2 text-left">Table</th>
                    <th class="p-2 text-left">Statut</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                <tr class="border-t">
                    <td class="p-2">{{ $commande->id }}</td>
                    <td class="p-2">{{ $commande->table->numero }}</td>
                    <td class="p-2">{{ $commande->statut }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('commandes.show', $commande) }}" class="text-blue-600">Voir</a>
                        <a href="{{ route('commandes.ticket', $commande) }}" class="text-green-600">Ticket</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>