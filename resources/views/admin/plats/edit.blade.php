@extends('layouts.admin')
@section('title', 'Modifier le plat')

@section('content')

<div class="page-header">
  <div style="display:flex;align-items:center;gap:14px;">
    <a href="{{ route('admin.plats.index') }}" class="btn-back">
      <i class="bi bi-arrow-left"></i> Retour
    </a>
    <h1 class="page-title">Modifier <span>{{ $plat->nom }}</span></h1>
  </div>
</div>

<div class="form-wrap">
  <div class="form-card">

    <form action="{{ route('admin.plats.update', $plat) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-row">
        {{-- Nom --}}
        <div class="form-group">
          <label class="form-label">Nom du plat <span class="required">*</span></label>
          <input type="text"
                 name="nom"
                 class="form-input {{ $errors->has('nom') ? 'is-invalid' : '' }}"
                 value="{{ old('nom', $plat->nom) }}"
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
                 value="{{ old('prix', $plat->prix) }}"
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
              {{ old('categorie_id', $plat->categorie_id) == $categorie->id ? 'selected' : '' }}>
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
                  rows="3">{{ old('description', $plat->description) }}</textarea>
        @error('description')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      {{-- Image : affiche l'image actuelle + permet d'en uploader une nouvelle --}}
      <div class="form-group">
        <label class="form-label">Photo du plat</label>

        @if($plat->image)
          <div class="img-preview-current">
            <p>Image actuelle :</p>
            <img src="{{ asset('storage/' . $plat->image) }}" alt="{{ $plat->nom }}">
          </div>
        @endif

        <div class="upload-zone" onclick="document.getElementById('image-input').click()">
          <span class="upload-icon"><i class="bi bi-cloud-arrow-up-fill"></i></span>
          <div class="upload-text">
            <strong>Cliquez pour changer l'image</strong><br>
            JPG, PNG, WEBP — Max 2 Mo
          </div>
        </div>

        <input type="file"
               id="image-input"
               name="image"
               accept="image/jpeg,image/png,image/webp"
               style="display:none">

        <div id="preview-wrap" style="display:none;margin-top:12px;">
          <p class="form-hint">Nouvelle image :</p>
          <img id="img-preview" src="" alt="Aperçu"
               style="max-height:130px;border-radius:10px;border:2px solid var(--gold-pale);box-shadow:var(--shadow);">
        </div>

        <span class="form-hint">Laissez vide pour conserver l'image actuelle.</span>
        @error('image')
          <span class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="btn-submit">
        <i class="bi bi-save-fill"></i> Mettre à jour le plat
      </button>
    </form>

  </div>
</div>

<script>
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
