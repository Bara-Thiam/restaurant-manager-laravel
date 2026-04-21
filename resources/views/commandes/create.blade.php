<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Nouvelle commande</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto px-4">
        <form action="{{ route('commandes.store') }}" method="POST">
            @csrf

            {{-- Choix de la table --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Table</label>
                <select name="table_id" class="border rounded w-full p-2" required>
                    <option value="">-- Choisir une table --</option>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}">Table {{ $table->numero }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Sélection des plats --}}
            <div class="mb-4">
                <label class="block font-medium mb-2">Plats</label>
                @foreach ($plats as $index => $plat)
                <div class="flex items-center gap-4 mb-2 border p-2 rounded">
                    <input type="hidden" name="plats[{{ $index }}][id]" value="{{ $plat->id }}">
                    <span class="flex-1">{{ $plat->nom }} — {{ $plat->prix }} FCFA</span>
                    <input type="number" 
                           name="plats[{{ $index }}][quantite]" 
                           min="0" value="0"
                           class="border rounded w-20 p-1 text-center">
                </div>
                @endforeach
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">
                Valider la commande
            </button>
        </form>
    </div>
</x-app-layout>