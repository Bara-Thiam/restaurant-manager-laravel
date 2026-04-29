@extends('layouts.admin')
@section('title', 'Ticket #' . $commande->id)

@section('content')

<div class="page-header print:hidden">
  <h1 class="page-title">Ticket <span>de caisse</span></h1>
  <div style="display:flex;gap:10px;">
    <button onclick="window.print()" class="btn-add">
      <i class="bi bi-printer-fill"></i> Imprimer
    </button>
    <a href="{{ route('commandes.show', $commande) }}" class="btn-back">
      <i class="bi bi-arrow-left"></i> Retour
    </a>
  </div>
</div>

{{-- Ticket --}}
<div style="max-width:480px;margin:0 auto;">
  <div class="form-card" style="font-family:'Outfit',sans-serif;">

    {{-- En-tête --}}
    <div style="text-align:center;margin-bottom:24px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:2rem;font-weight:700;color:var(--gold);">
        <i class="bi bi-cup-hot-fill"></i> Saveurs du Sénégal
      </div>
      <div style="font-size:0.78rem;color:var(--text-soft);letter-spacing:2px;text-transform:uppercase;">
        Cuisine Authentique
      </div>
      <div style="font-size:0.82rem;color:var(--text-soft);margin-top:8px;">
        {{ now()->format('d/m/Y à H:i') }}
      </div>
    </div>

    <div style="border-top:2px dashed var(--border);padding-top:16px;margin-bottom:16px;">
      <div style="display:flex;justify-content:space-between;font-size:0.85rem;margin-bottom:6px;">
        <span style="color:var(--text-soft);">Table</span>
        <span style="font-weight:600;">N° {{ $commande->table->numero }}</span>
      </div>
      <div style="display:flex;justify-content:space-between;font-size:0.85rem;margin-bottom:6px;">
        <span style="color:var(--text-soft);">Serveur</span>
        <span style="font-weight:600;">{{ $commande->user->name }}</span>
      </div>
      <div style="display:flex;justify-content:space-between;font-size:0.85rem;">
        <span style="color:var(--text-soft);">Commande</span>
        <span style="font-weight:600;">#{{ str_pad($commande->id, 4, '0', STR_PAD_LEFT) }}</span>
      </div>
    </div>

    {{-- Lignes plats --}}
    <div style="border-top:2px dashed var(--border);padding-top:16px;">
      @php $total = 0; @endphp
      @foreach ($commande->plats as $plat)
        @php $sousTotal = $plat->prix * $plat->pivot->quantite; $total += $sousTotal; @endphp
        <div style="display:grid;grid-template-columns:1fr 40px 120px;gap:8px;
                    padding:8px 0;border-bottom:1px solid var(--border);font-size:0.85rem;">
          <span style="font-weight:500;">{{ $plat->nom }}</span>
          <span style="text-align:center;color:var(--text-soft);">x{{ $plat->pivot->quantite }}</span>
          <span style="text-align:right;color:var(--gold);font-weight:600;">
            {{ number_format($sousTotal, 0, ',', ' ') }} F
          </span>
        </div>
      @endforeach
    </div>

    {{-- Total --}}
    <div style="border-top:2px solid var(--gold);margin-top:16px;padding-top:16px;
                display:flex;justify-content:space-between;align-items:center;">
      <span style="font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;">TOTAL</span>
      <span style="font-family:'Cormorant Garamond',serif;font-size:1.8rem;font-weight:700;color:var(--gold);">
        {{ number_format($total, 0, ',', ' ') }} FCFA
      </span>
    </div>

    <div style="text-align:center;margin-top:24px;font-size:0.78rem;color:var(--text-soft);
                border-top:2px dashed var(--border);padding-top:16px;">
      Merci de votre visite !<br>
      <i class="bi bi-heart-fill" style="color:var(--bordeaux);"></i>
    </div>

  </div>
</div>

<style>
@media print {
  .topnav, .sidebar, .page-header, .btn-back { display: none !important; }
  .main { padding: 0 !important; }
}
</style>

@endsection