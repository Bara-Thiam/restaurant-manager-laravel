@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 550px;">
    <h2 class="mb-4">Modifier : {{ $menu->nom }}</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom du menu</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $menu->nom) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $menu->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Date de début</label>
            <input type="date" name="date_debut" class="form-control"
                   value="{{ old('date_debut', $menu->date_debut->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Date de fin</label>
            <input type="date" name="date_fin" class="form-control"
                   value="{{ old('date_fin', $menu->date_fin->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="actif" class="form-check-input" id="actif"
                   {{ $menu->actif ? 'checked' : '' }}>
            <label class="form-check-label" for="actif">Menu actif</label>
        </div>
        <button type="submit" class="btn btn-warning w-100">Enregistrer</button>
        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary w-100 mt-2">Annuler</a>
    </form>
</div>
@endsection