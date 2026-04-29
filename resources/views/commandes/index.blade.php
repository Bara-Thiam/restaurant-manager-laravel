@extends('layouts.admin')
@section('title', 'Commandes')

@section('content')

<div class="stats">
  <div class="stat-card">
    <div class="stat-icon gold"><i class="bi bi-receipt"></i></div>
    <div class="stat-num">{{ $commandes->count() }}</div>
    <div class="stat-label">Commandes totales</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon bord"><i class="bi bi-clock-history"></i></div>
    <div class="stat-num">{{ $commandes->where('statut','en_attente')->count() }}</div>
    <div class="stat-label">En attente</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon blue"><i class="bi bi-fire"></i></div>
    <div class="stat-num">{{ $commandes->where('statut','en_cours')->count() }}</div>
    <div class="stat-label">En cours</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green"><i class="bi bi-check2-circle"></i></div>
    <div class="stat-num">{{ $commandes->where('statut','payee')->count() }}</div>
    <div class="stat-label">Payées</div>
  </div>
</div>

<div class="page-header">
  <h1 class="page-title">Commandes <span>du restaurant</span></h1>
  <a href="{{ route('commandes.create') }}" class="btn-add">
    <i class="bi bi-plus-lg"></i> Nouvelle commande
  </a>
</div>

<div class="table-card">
  <div class="table-head" style="grid-template-columns: 60px 100px 140px 130px 120px 150px;">
    <span>#</span>
    <span>Table</span>
    <span>Serveur</span>
    <span>Statut</span>
    <span>Date</span>
    <span>Actions</span>
  </div>

  @forelse($commandes as $commande)
  <div class="table-row" style="grid-template-columns: 60px 100px 140px 130px 120px 150px;">
    <span class="id-num">{{ str_pad($commande->id, 2, '0', STR_PAD_LEFT) }}</span>
    <span class="nom">Table {{ $commande->table->numero }}</span>
    <span class="desc">{{ $commande->user->name }}</span>
    <span>
      @php
        $colors = [
          'en_attente' => ['bg'=>'#fef9c3','color'=>'#854d0e'],
          'en_cours'   => ['bg'=>'#dbeafe','color'=>'#1d4ed8'],
          'servie'     => ['bg'=>'#d8f3dc','color'=>'#2d6a4f'],
          'payee'      => ['bg'=>'#f3f4f6','color'=>'#374151'],
        ];
        $c = $colors[$commande->statut] ?? ['bg'=>'#f3f4f6','color'=>'#374151'];
      @endphp
      <span style="background:{{ $c['bg'] }};color:{{ $c['color'] }};padding:4px 12px;border-radius:20px;font-size:0.73rem;font-weight:600;">
        {{ ucfirst(str_replace('_',' ',$commande->statut)) }}
      </span>
    </span>
    <span class="desc">{{ $commande->created_at->format('d/m/Y H:i') }}</span>
    <div class="action-btns">
      <a href="{{ route('commandes.show', $commande) }}" class="btn-edit">
        <i class="bi bi-eye-fill"></i>
      </a>
      <a href="{{ route('commandes.ticket', $commande) }}" 
         class="btn-edit" style="background:#d8f3dc;color:#2d6a4f;border-color:#a8d5b5;">
        <i class="bi bi-printer-fill"></i>
      </a>
    </div>
  </div>
  @empty
  <div style="padding:40px;text-align:center;color:var(--text-soft);">
    <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:8px;opacity:0.4;"></i>
    Aucune commande pour l'instant.
  </div>
  @endforelse
</div>

@endsection