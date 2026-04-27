@extends('layouts.admin')
@section('title', 'Menu — Vue Client')

@section('content')

<style>
/* === Styles spécifiques à la vue client === */
.menu-hero {
  background: linear-gradient(135deg, var(--bordeaux-dk) 0%, var(--bordeaux) 45%, #5a2a08 100%);
  border-radius: 18px;
  padding: 52px 44px 80px;
  margin-bottom: 40px;
  position: relative;
  overflow: hidden;
}
.menu-hero::before {
  content: '';
  position: absolute;
  bottom: -10px; left: 0; right: 0; height: 60px;
  background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 40%, var(--gold-mid) 70%, var(--gold) 100%);
  border-radius: 50% 50% 0 0 / 20px 20px 0 0;
  opacity: 0.85;
}
.menu-hero::after {
  content: '';
  position: absolute; top: -80px; right: -80px;
  width: 280px; height: 280px;
  background: radial-gradient(circle, rgba(201,168,76,0.18) 0%, transparent 70%);
  border-radius: 50%;
}
.hero-tag {
  display: inline-block;
  background: rgba(201,168,76,0.18);
  border: 1px solid rgba(201,168,76,0.45);
  color: var(--gold-light);
  font-size: 0.7rem; letter-spacing: 3px; text-transform: uppercase;
  padding: 5px 16px; border-radius: 20px; margin-bottom: 18px; font-weight: 600;
}
.hero-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 3.2rem; font-weight: 700;
  color: white; line-height: 1.1; margin-bottom: 10px;
}
.hero-title em { color: var(--gold-light); font-style: italic; }
.hero-sub { color: rgba(255,255,255,0.65); font-size: 0.95rem; font-weight: 300; max-width: 440px; }

.features-bar {
  display: grid; grid-template-columns: repeat(4,1fr);
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 14px; margin-bottom: 40px;
  overflow: hidden; box-shadow: var(--shadow);
}
.feature-item {
  display: flex; flex-direction: column; align-items: center;
  padding: 20px 16px; gap: 8px;
  border-right: 1px solid var(--border); transition: background 0.2s;
}
.feature-item:last-child { border-right: none; }
.feature-item:hover { background: var(--gold-pale); }
.feature-icon { font-size: 1.5rem; color: var(--gold); }
.feature-label { font-weight: 600; font-size: 0.82rem; color: var(--text); }
.feature-sub { font-size: 0.72rem; color: var(--text-soft); }

.menu-section-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.7rem; font-weight: 700;
  color: var(--text); margin-bottom: 22px;
  display: flex; align-items: center; gap: 14px;
}
.menu-section-title .line { flex: 1; height: 1px; background: linear-gradient(to right, var(--gold-light), transparent); }
.menu-section-title .icon-wrap {
  width: 32px; height: 32px; background: var(--gold-pale);
  border-radius: 8px; display: flex; align-items: center; justify-content: center;
  color: var(--gold); font-size: 0.95rem;
}
.plats-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 22px; margin-bottom: 44px; }
.plat-card {
  background: var(--white); border: 1px solid var(--border);
  border-radius: 16px; overflow: hidden;
  box-shadow: var(--shadow); transition: all 0.3s; cursor: pointer;
}
.plat-card:hover { box-shadow: var(--shadow-hover); transform: translateY(-5px); border-color: var(--gold-light); }
.plat-img-wrap { position: relative; height: 185px; overflow: hidden; }
.plat-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
.plat-card:hover .plat-img-wrap img { transform: scale(1.06); }
.plat-img-placeholder {
  width: 100%; height: 100%;
  background: var(--gold-pale);
  display: flex; align-items: center; justify-content: center;
  color: var(--gold); font-size: 3rem;
}
.plat-cat-tag {
  position: absolute; top: 10px; left: 10px;
  background: rgba(255,255,255,0.96);
  color: var(--gold); font-size: 0.68rem;
  font-weight: 700; letter-spacing: 0.5px;
  padding: 3px 10px; border-radius: 20px;
  border: 1px solid var(--gold-light);
}
.plat-body { padding: 16px 18px 18px; }
.plat-name {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.18rem; font-weight: 700;
  color: var(--text); margin-bottom: 6px; line-height: 1.2;
}
.plat-desc { color: var(--text-soft); font-size: 0.78rem; line-height: 1.5; margin-bottom: 14px; }
.plat-footer { display: flex; justify-content: space-between; align-items: center; }
.plat-prix { font-weight: 700; font-size: 1.05rem; color: var(--gold); font-family: 'Cormorant Garamond', serif; }
.btn-commander {
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
  color: white; border: none;
  padding: 8px 16px; border-radius: 8px;
  font-size: 0.78rem; font-weight: 500;
  cursor: pointer; font-family: 'Outfit', sans-serif;
  transition: all 0.2s; box-shadow: 0 2px 8px rgba(139,105,20,0.25);
}
.btn-commander:hover { filter: brightness(1.1); box-shadow: 0 4px 14px rgba(139,105,20,0.4); }
.empty-cat {
  grid-column: 1/-1;
  text-align: center; padding: 30px;
  color: var(--text-soft); font-size: 0.88rem;
}
</style>

{{-- HERO --}}
<div class="menu-hero">
  <div class="hero-tag">✦ Cuisine Sénégalaise Authentique</div>
  <h1 class="hero-title">Le Goût Authentique<br>du <em>Sénégal</em></h1>
  <p class="hero-sub">Découvrez nos plats traditionnels préparés avec passion et des ingrédients 100% frais.</p>
</div>

{{-- FEATURES BAR --}}
<div class="features-bar">
  <div class="feature-item">
    <span class="feature-icon"><i class="bi bi-leaf"></i></span>
    <span class="feature-label">Ingrédients frais</span>
    <span class="feature-sub">100% naturels</span>
  </div>
  <div class="feature-item">
    <span class="feature-icon"><i class="bi bi-cup-hot-fill"></i></span>
    <span class="feature-label">Recettes</span>
    <span class="feature-sub">traditionnelles</span>
  </div>
  <div class="feature-item">
    <span class="feature-icon"><i class="bi bi-heart-fill"></i></span>
    <span class="feature-label">Préparé</span>
    <span class="feature-sub">avec amour</span>
  </div>
  <div class="feature-item">
    <span class="feature-icon"><i class="bi bi-people-fill"></i></span>
    <span class="feature-label">Ambiance</span>
    <span class="feature-sub">conviviale</span>
  </div>
</div>

{{-- MENU PAR CATÉGORIE --}}
{{-- On parcourt chaque catégorie avec ses plats (eager loaded) --}}
@forelse($categories as $categorie)

  <h2 class="menu-section-title">
    <span class="icon-wrap"><i class="bi bi-egg-fried"></i></span>
    {{ $categorie->nom }}
    <span class="line"></span>
  </h2>

  <div class="plats-grid">
    @forelse($categorie->plats as $plat)
    <div class="plat-card">
      <div class="plat-img-wrap">
        @if($plat->image)
          <img src="{{ asset('storage/' . $plat->image) }}"
               alt="{{ $plat->nom }}"
               onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="plat-img-placeholder" style="display:none"><i class="bi bi-image"></i></div>
        @else
          <div class="plat-img-placeholder"><i class="bi bi-image"></i></div>
        @endif
        <span class="plat-cat-tag">{{ $categorie->nom }}</span>
      </div>
      <div class="plat-body">
        <div class="plat-name">{{ $plat->nom }}</div>
        <div class="plat-desc">{{ Str::limit($plat->description, 90) }}</div>
        <div class="plat-footer">
          <span class="plat-prix">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
          <button class="btn-commander">Commander</button>
        </div>
      </div>
    </div>
    @empty
    <div class="empty-cat">
      <i class="bi bi-inbox" style="font-size:1.8rem;display:block;margin-bottom:6px;opacity:0.3;"></i>
      Aucun plat dans cette catégorie.
    </div>
    @endforelse
  </div>

@empty
  <div style="text-align:center;padding:60px;color:var(--text-soft);">
    <i class="bi bi-inbox" style="font-size:3rem;display:block;margin-bottom:12px;opacity:0.3;"></i>
    Aucune catégorie ni plat pour l'instant.
  </div>
@endforelse

@endsection
