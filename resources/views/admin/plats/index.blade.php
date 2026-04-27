@extends('layouts.admin')
@section('title', 'Plats')

@section('content')

<div class="page-header">
  <h1 class="page-title">Plats <span>du restaurant</span></h1>
  <a href="{{ route('admin.plats.create') }}" class="btn-add">
    <i class="bi bi-plus-lg"></i> Nouveau plat
  </a>
</div>

<div class="table-card">
  <div class="table-head head-plat">
    <span>Photo</span>
    <span>Nom</span>
    <span>Catégorie</span>
    <span>Prix</span>
    <span>Description</span>
    <span>Actions</span>
  </div>

  @forelse($plats as $plat)
  <div class="table-row row-plat">

    {{-- Photo miniature --}}
    @if($plat->image)
      <img class="food-img"
           src="{{ asset('storage/' . $plat->image) }}"
           alt="{{ $plat->nom }}"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
      <div class="img-placeholder" style="display:none"><i class="bi bi-image"></i></div>
    @else
      <div class="img-placeholder"><i class="bi bi-image"></i></div>
    @endif

    <span class="nom">{{ $plat->nom }}</span>

    <span class="badge-cat">
      <i class="bi bi-tag"></i> {{ $plat->categorie->nom }}
    </span>

    <span class="prix">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>

    <span class="desc">{{ Str::limit($plat->description, 55) }}</span>

    <div class="action-btns">
      <a href="{{ route('admin.plats.edit', $plat) }}" class="btn-edit">
        <i class="bi bi-pencil-fill"></i>
      </a>
      <form action="{{ route('admin.plats.destroy', $plat) }}"
            method="POST" style="display:inline"
            onsubmit="return confirm('Supprimer ce plat ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-del"><i class="bi bi-trash-fill"></i></button>
      </form>
    </div>

  </div>
  @empty
  <div style="padding:40px;text-align:center;color:var(--text-soft);">
    <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:8px;opacity:0.4;"></i>
    Aucun plat pour l'instant.
  </div>
  @endforelse
</div>

<div style="margin-top:20px;">
  {{ $plats->links() }}
</div>

@endsection
