@extends('layouts.admin')
@section('title', 'Commande #' . $commande->id)

@section('content')

<div class="page-header">
  <h1 class="page-title">Commande <span>#{{ str_pad($commande->id, 2, '0', STR_PAD_LEFT) }}</span></h1>
  <div style="display:flex;gap:10px;">
    <a href="{{ route('commandes.ticket', $commande) }}" class="btn-add">
      <i class="bi bi-printer-fill"></i> Ticket de caisse
    </a>
    <a href="{{ route('commandes.index') }}" class="btn-back">
      <i class="bi bi-arrow-left"></i> Retour
    </a>
  </div>
</div>

<div class="stats">
  <div class="stat-card">
    <div class="stat-icon gold"><i class="bi bi-person-fill"></i></div>
    <div class="stat-num" style="font-size:1.3rem;">{{ $commande->user->name }}</div>
    <div class="stat-label">Serveur</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon bord"><i class="bi bi-layout-split"></i></div>
    <div class="stat-num">{{ $commande->table->numero }}</div>
    <div class="stat-label">Numéro de table</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon blue"><i class="bi bi-bag-fill"></i></div>
    <div class="stat-num">{{ $commande->plats->count() }}</div>
    <div class="stat-label">Plats commandés</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green"><i class="bi bi-cash-stack"></i></div>
    <div class="stat-num" style="font-size:1.4rem;">
      {{ number_format($commande->plats->sum(fn($p) => $p->prix * $p->pivot->quantite), 0, ',', ' ') }}
    </div>
    <div class="stat-label">Total FCFA</div>
  </div>
</div>

<div class="table-card">
  <div class="table-head" style="grid-template-columns:60px 1fr 120px 140px 140px;">
    <span>#</span>
    <span>Plat</span>
    <span>Quantité</span>
    <span>Prix unitaire</span>
    <span>Sous-total</span>
  </div>

  @php $total = 0; @endphp
  @foreach ($commande->plats as $plat)
    @php $sousTotal = $plat->prix * $plat->pivot->quantite; $total += $sousTotal; @endphp
    <div class="table-row" style="grid-template-columns:60px 1fr 120px 140px 140px;">
      <span class="id-num">{{ $loop->iteration }}</span>
      <span class="nom">{{ $plat->nom }}</span>
      <span class="badge-count">x{{ $plat->pivot->quantite }}</span>
      <span class="prix">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
      <span class="prix">{{ number_format($sousTotal, 0, ',', ' ') }} FCFA</span>
    </div>
  @endforeach

  <div style="padding:16px 20px;text-align:right;border-top:2px solid var(--gold-light);
              background:var(--gold-pale);font-family:'Cormorant Garamond',serif;
              font-size:1.4rem;font-weight:700;color:var(--gold);">
    TOTAL : {{ number_format($total, 0, ',', ' ') }} FCFA
  </div>
</div>

@endsection