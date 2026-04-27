@extends('layouts.admin')
@section('title', 'Nouveau plat')

@section('content')

<div class="page-header">
  <div style="display:flex;align-items:center;gap:14px;">
    <a href="{{ route('admin.plats.index') }}" class="btn-back">
      <i class="bi bi-arrow-left"></i> Retour
    </a>
    <h1 class="page-title">Nouveau <span>plat</span></h1>
  </div>
</div>

<div class="form-wrap">
  <div class="form-card">

    {{--
      enctype="multipart/form-data" est OBLIGATOIRE pour recevoir le fichier image.
      Sans ça, $request->file('image') retourne null.
    --}}
    <form action="{{ route('admin.plats.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-row">
        {{-- Nom --}}
        <div class="form-group">
          <label class="form-label">Nom du plat <span class="required">*</span></label>
          <input type="text"
                 name="nom"
                 class="form-input {{ $errors->has('nom') ? 'is-invalid' : '' }}"
                 value="{{ old('nom') }}"
                 placeholder="Ex : Thiéboudienne Rouge"
                 required>
          @error('nom')
            <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
          @enderror
        </div>

        {{-- Prix --}}
        <div class="form-group">
          <label class="form-label">Prix (FCFA) <span class="required">*</span></label>
          <input type="number"
                 name="prix"
                 class="form-input {{ $errors->has('prix') ? 'is-invalid' : '' }}"
                 value="{{ old('prix') }}"
                 placeholder="3500"
                 min="0" step="50"
                 required>
          @error('prix')
            <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
          @enderror
        </div>
      </div>

      {{-- Catégorie --}}
      <div class="form-group">
        <label class="form-label">Catégorie <span class="required">*</span></label>
        <select name="categorie_id"
                class="form-input {{ $errors->has('categorie_id') ? 'is-invalid' : '' }}"
                required>
          <option value="">-- Choisir une catégorie --</option>
          @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}"
              {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
              {{ $categorie->nom }}
            </option>
          @endforeach
        </select>
        @error('categorie_id')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      {{-- Description --}}
      <div class="form-group">
        <label class="form-label">Description</label>
        <textarea name="description"
                  class="form-input {{ $errors->has('description') ? 'is-invalid' : '' }}"
                  rows="3"
                  placeholder="Décrivez ce plat...">{{ old('description') }}</textarea>
        @error('description')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      {{-- Upload image --}}
      <div class="form-group">
        <label class="form-label">Photo du plat</label>

        <div class="upload-zone" onclick="document.getElementById('image-input').click()">
          <span class="upload-icon"><i class="bi bi-cloud-arrow-up-fill"></i></span>
          <div class="upload-text">
            <strong>Cliquez pour uploader</strong> ou glissez-déposez<br>
            JPG, PNG, WEBP — Max 2 Mo
          </div>
        </div>

        <input type="file"
               id="image-input"
               name="image"
               accept="image/jpeg,image/png,image/webp"
               style="display:none"
               onchange="previewImage(this,'img-preview')">

        {{-- Prévisualisation --}}
        <div id="preview-wrap" style="display:none;margin-top:12px;">
          <p class="form-hint">Aperçu :</p>
          <img id="img-preview" src="" alt="Aperçu"
               style="max-height:130px;border-radius:10px;border:2px solid var(--gold-pale);box-shadow:var(--shadow);">
        </div>

        @error('image')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
        <span class="form-hint">Laissez vide si pas de photo pour l'instant.</span>
      </div>

      <button type="submit" class="btn-submit">
        <i class="bi bi-save-fill"></i> Enregistrer le plat
      </button>
    </form>

  </div>
</div>

<script>
// Override de la fonction générique pour afficher le wrapper
document.getElementById('image-input').addEventListener('change', function() {
  const file = this.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = e => {
    document.getElementById('img-preview').src = e.target.result;
    document.getElementById('preview-wrap').style.display = 'block';
  };
  reader.readAsDataURL(file);
});
</script>

@endsection
