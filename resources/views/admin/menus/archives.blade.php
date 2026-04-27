@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Menus supprimés</h2>
        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">← Retour</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Période</th>
                <th>Supprimé le</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
            <tr>
                <td>{{ $menu->nom }}</td>
                <td>{{ $menu->date_debut->format('d/m/Y') }} → {{ $menu->date_fin->format('d/m/Y') }}</td>
                <td>{{ $menu->deleted_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('admin.menus.restore', $menu->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-success">Restaurer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Aucun menu supprimé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection