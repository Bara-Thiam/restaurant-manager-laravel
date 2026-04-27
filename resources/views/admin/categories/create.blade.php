@extends('layouts.admin')
@section('title', 'Nouvelle catégorie')

@section('content')

<div class="page-header">
  <div style="display:flex;align-items:center;gap:14px;">
    <a href="{{ route('admin.categories.index') }}" class="btn-back">
      <i class="bi bi-arrow-left"></i> Retour
    </a>
    <h1 class="page-title">Nouvelle <span>catégorie</span></h1>
  </div>
</div>

<div class="form-wrap">
  <div class="form-card">

    <form action="{{ route('admin.categories.store') }}" method="POST">
      @csrf

      {{-- Nom --}}
      <div class="form-group">
        <label class="form-label">
          Nom <span class="required">*</span>
        </label>
        <input type="text"
               name="nom"
               class="form-input {{ $errors->has('nom') ? 'is-invalid' : '' }}"
               value="{{ old('nom') }}"
               placeholder="Ex : Plats de résistance"
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
                  rows="4"
                  placeholder="Décrivez cette catégorie...">{{ old('description') }}</textarea>
        @error('description')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="btn-submit">
        <i class="bi bi-save-fill"></i> Enregistrer la catégorie
      </button>
    </form>

  </div>
</div>

@endsection
