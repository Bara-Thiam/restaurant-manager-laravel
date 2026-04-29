@extends('layouts.admin')
@section('title', 'Nouvelle commande')

@section('content')

<div class="page-header">
  <h1 class="page-title">Nouvelle <span>commande</span></h1>
  <a href="{{ route('commandes.index') }}" class="btn-back">
    <i class="bi bi-arrow-left"></i> Retour
  </a>
</div>

@if($errors->any())
  <div class="alert-error">
    <i class="bi bi-exclamation-triangle-fill"></i>
    @foreach($errors->all() as $error) {{ $error }} @endforeach
  </div>
@endif

<form action="{{ route('commandes.store') }}" method="POST">
  @csrf
  <div class="form-wrap" style="max-width:780px;">
    <div class="form-card">

      {{-- Choix de la table --}}
      <div class="form-group">
        <label class="form-label">Table <span class="required">*</span></label>
        <select name="table_id" class="form-input" required>
          <option value="">-- Choisir une table --</option>
          @foreach ($tables as $table)
            <option value="{{ $table->id }}">
              Table {{ $table->numero }} — {{ $table->capacite }} places
            </option>
          @endforeach
        </select>
      </div>

      {{-- Sélection des plats --}}
      <div class="form-group">
        <label class="form-label">Plats <span class="required">*</span></label>
        <div style="display:flex;flex-direction:column;gap:10px;">
          @foreach ($plats as $index => $plat)
          <div style="display:grid;grid-template-columns:1fr 180px;align-items:center;gap:16px;
                      background:var(--cream);border:1.5px solid var(--border);
                      border-radius:10px;padding:12px 16px;">
            <input type="hidden" name="plats[{{ $index }}][id]" value="{{ $plat->id }}">
            <div>
              <div style="font-weight:600;color:var(--text);font-size:0.9rem;">{{ $plat->nom }}</div>
              <div style="font-size:0.78rem;color:var(--text-soft);">{{ $plat->categorie->nom ?? '' }}</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px;">
              <span class="prix">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
              <input type="number"
                     name="plats[{{ $index }}][quantite]"
                     min="0" value="0"
                     class="form-input" style="width:70px;text-align:center;padding:8px;">
            </div>
          </div>
          @endforeach
        </div>
        <div class="form-hint">Laissez 0 pour les plats non commandés.</div>
      </div>

      <button type="submit" class="btn-submit">
        <i class="bi bi-check-lg"></i> Valider la commande
      </button>

    </div>
  </div>
</form>

@endsection