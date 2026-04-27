@extends('layouts.admin')
@section('title', 'Modifier la catégorie')

@section('content')

<div class="page-header">
  <div style="display:flex;align-items:center;gap:14px;">
    <a href="{{ route('admin.categories.index') }}" class="btn-back">
      <i class="bi bi-arrow-left"></i> Retour
    </a>
    <h1 class="page-title">Modifier <span>{{ $categorie->nom }}</span></h1>
  </div>
</div>

<div class="form-wrap">
  <div class="form-card">

    <form action="{{ route('admin.categories.update', $categorie) }}" method="POST">
      @csrf
      @method('PUT')

      {{-- Nom --}}
      <div class="form-group">
        <label class="form-label">
          Nom <span class="required">*</span>
        </label>
        <input type="text"
               name="nom"
               class="form-input {{ $errors->has('nom') ? 'is-invalid' : '' }}"
               value="{{ old('nom', $categorie->nom) }}"
               required>
        @error('nom')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      {{-- Description --}}
      <div class="form-group">
        <label class="form-label">Description</label>
        <textarea name="description"
                  class="form-input {{ $errors->has('description') ? 'is-invalid' : '' }}"
                  rows="4">{{ old('description', $categorie->description) }}</textarea>
        @error('description')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      {{-- Info : plats liés --}}
      @if($categorie->plats()->count() > 0)
      <div style="background:var(--gold-pale);border:1px solid var(--gold-light);border-radius:10px;padding:12px 16px;margin-bottom:22px;font-size:0.82rem;color:var(--text-soft);">
        <i class="bi bi-info-circle" style="color:var(--gold);"></i>
        Cette catégorie contient <strong>{{ $categorie->plats()->count() }} plat(s)</strong>.
        La supprimer entraînera la suppression en cascade de ces plats.
      </div>
      @endif

      <button type="submit" class="btn-submit">
        <i class="bi bi-save-fill"></i> Mettre à jour
      </button>
    </form>

  </div>
</div>

@endsection
