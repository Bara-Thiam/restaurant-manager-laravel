@extends('layouts.admin')
@section('title', 'Catégories')

@section('content')

{{-- Stats --}}
<div class="stats">
  <div class="stat-card">
    <div class="stat-icon gold"><i class="bi bi-tag-fill"></i></div>
    <div class="stat-num">{{ $categories->total() }}</div>
    <div class="stat-label">Catégories actives</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon bord"><i class="bi bi-egg-fried"></i></div>
    <div class="stat-num">{{ \App\Models\Plat::count() }}</div>
    <div class="stat-label">Plats au menu</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon blue"><i class="bi bi-eye-fill"></i></div>
    <div class="stat-num">248</div>
    <div class="stat-label">Vues ce mois</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green"><i class="bi bi-archive-fill"></i></div>
    <div class="stat-num">{{ \App\Models\Categorie::onlyTrashed()->count() }}</div>
    <div class="stat-label">Supprimés (soft)</div>
  </div>
</div>

{{-- En-tête page --}}
<div class="page-header">
  <h1 class="page-title">Catégories <span>du menu</span></h1>
  <a href="{{ route('admin.categories.create') }}" class="btn-add">
    <i class="bi bi-plus-lg"></i> Nouvelle catégorie
  </a>
</div>

{{-- Tableau --}}
<div class="table-card">
  <div class="table-head head-cat">
    <span>#</span>
    <span>Nom</span>
    <span>Description</span>
    <span>Nb. plats</span>
    <span>Actions</span>
  </div>

  @forelse($categories as $categorie)
  <div class="table-row row-cat">
    <span class="id-num">{{ str_pad($categorie->id, 2, '0', STR_PAD_LEFT) }}</span>
    <span class="nom">{{ $categorie->nom }}</span>
    <span class="desc">{{ Str::limit($categorie->description, 70) }}</span>
    <span class="badge-count">{{ $categorie->plats()->count() }} plat(s)</span>
    <div class="action-btns">
      <a href="{{ route('admin.categories.edit', $categorie) }}" class="btn-edit">
        <i class="bi bi-pencil-fill"></i>
      </a>
      <form action="{{ route('admin.categories.destroy', $categorie) }}"
            method="POST" style="display:inline"
            onsubmit="return confirm('Supprimer cette catégorie ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-del"><i class="bi bi-trash-fill"></i></button>
      </form>
    </div>
  </div>
  @empty
  <div style="padding:40px;text-align:center;color:var(--text-soft);">
    <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:8px;opacity:0.4;"></i>
    Aucune catégorie pour l'instant.
  </div>
  @endforelse
</div>

{{-- Pagination --}}
<div style="margin-top:20px;">
  {{ $categories->links() }}
</div>

@endsection
