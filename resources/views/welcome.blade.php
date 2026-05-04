<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saveurs du Sénégal — Cuisine Authentique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; background: #fff; color: #1a1a1a; }

        /* ── NAVBAR ── */
        .navbar {
            padding: 1rem 3rem;
            background: #fff;
            box-shadow: 0 2px 16px rgba(0,0,0,0.06);
            position: sticky; top: 0; z-index: 100;
        }
        .brand-wrap { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .brand-icon-box {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, #b8860b, #8b6400);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.2rem;
            box-shadow: 0 3px 10px rgba(184,134,11,0.35);
        }
        .brand-text .brand-name { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 700; color: #1a1a1a; letter-spacing: 1px; display: block; }
        .brand-text .brand-sub { font-size: 0.65rem; color: #b8860b; letter-spacing: 2.5px; text-transform: uppercase; }
        .nav-link { color: #444 !important; font-size: 0.88rem; font-weight: 500; margin: 0 0.3rem; padding: 0.5rem 0.8rem !important; border-radius: 6px; transition: all 0.2s; }
        .nav-link:hover { color: #b8860b !important; background: #fdf6e3; }
        .nav-link.active { color: #b8860b !important; font-weight: 600; }
        .btn-nav-cta {
            background: linear-gradient(135deg, #b8860b, #9a7009);
            color: #fff; border: none;
            padding: 0.6rem 1.4rem; border-radius: 8px; font-size: 0.88rem; font-weight: 500;
            text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;
            box-shadow: 0 3px 12px rgba(184,134,11,0.35); transition: all 0.2s;
        }
        .btn-nav-cta:hover { color: #fff; filter: brightness(1.1); transform: translateY(-1px); }

        /* ── HERO ── */
        .hero {
            min-height: calc(100vh - 72px);
            background: linear-gradient(135deg, #fff 50%, #fdf8ee 100%);
            display: flex; align-items: center;
            position: relative; overflow: hidden;
            padding: 3rem 5rem;
        }
        .hero::before {
            content: '';
            position: absolute; bottom: -1px; left: -5%;
            width: 65%; height: 400px;
            background: linear-gradient(135deg, #6b0000 0%, #b8860b 55%, #f5d98a 100%);
            clip-path: ellipse(70% 100% at 15% 100%);
            z-index: 0; opacity: 0.9;
        }
        .hero::after {
            content: '';
            position: absolute; top: -100px; right: -100px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(184,134,11,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        /* GAUCHE */
        .hero-left { position: relative; z-index: 2; max-width: 520px; }
        .hero-tag {
            display: inline-flex; align-items: center; gap: 8px;
            background: #fdf6e3; border: 1px solid #e5c97a;
            color: #b8860b; font-size: 0.72rem; font-weight: 600;
            letter-spacing: 2px; text-transform: uppercase;
            padding: 6px 16px; border-radius: 20px; margin-bottom: 20px;
        }
        .hero-left h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4rem; font-weight: 700; line-height: 1.05; color: #1a1a1a;
            margin-bottom: 16px;
        }
        .hero-left h1 em { color: #b8860b; font-style: italic; }
        .hero-left p { color: #666; font-size: 1rem; line-height: 1.75; margin-bottom: 2rem; max-width: 400px; }

        .hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.5rem; }
        .btn-primary-hero {
            background: linear-gradient(135deg, #b8860b, #9a7009);
            color: #fff; border: none; padding: 0.85rem 2rem;
            border-radius: 10px; font-size: 0.95rem; font-weight: 500;
            text-decoration: none; display: inline-flex; align-items: center; gap: 0.6rem;
            box-shadow: 0 4px 16px rgba(184,134,11,0.4); transition: all 0.2s;
        }
        .btn-primary-hero:hover { color: #fff; filter: brightness(1.08); transform: translateY(-2px); box-shadow: 0 6px 22px rgba(184,134,11,0.5); }
        .btn-secondary-hero {
            background: #fff; color: #1a1a1a;
            border: 2px solid #ddd; padding: 0.85rem 2rem;
            border-radius: 10px; font-size: 0.95rem; font-weight: 500;
            text-decoration: none; display: inline-flex; align-items: center; gap: 0.6rem;
            transition: all 0.2s;
        }
        .btn-secondary-hero:hover { border-color: #b8860b; color: #b8860b; background: #fdf6e3; }

        .hero-stats { display: flex; gap: 2.5rem; }
        .hero-stat { text-align: center; }
        .hero-stat .stat-num { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 700; color: #D19917; display: block; line-height: 1; }
        .hero-stat .stat-label { font-size: 0.72rem; color: #F0ECEB; text-transform: uppercase; letter-spacing: 1px; }

        /* DROITE — carte plat */
        .hero-right { position: relative; z-index: 2; display: flex; flex-direction: column; gap: 1rem; align-items: flex-end; }

        .plat-card {
            background: #fff; border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.14);
            width: 400px; overflow: hidden;
            border: 1px solid #f0e8d5;
        }
        .plat-card-img { width: 100%; height: 240px; object-fit: cover; }
        .plat-card-img-placeholder {
            width: 100%; height: 240px;
            background: linear-gradient(135deg, #fdf6e3, #f5e8c0);
            display: flex; align-items: center; justify-content: center;
            font-size: 5rem; color: #b8860b; opacity: 0.5;
        }
        .plat-card-body { padding: 1.5rem 1.8rem 1.8rem; }
        .plat-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: #fdf6e3; color: #b8860b;
            font-size: 0.7rem; font-weight: 600; letter-spacing: 1px;
            text-transform: uppercase; padding: 4px 12px; border-radius: 20px;
            border: 1px solid #e5c97a; margin-bottom: 10px;
        }
        .plat-nom { font-family: 'Cormorant Garamond', serif; font-size: 1.7rem; font-weight: 700; color: #1a1a1a; line-height: 1.1; }
        .plat-type { font-size: 0.82rem; color: #b8860b; font-weight: 500; margin: 4px 0 8px; }
        .plat-desc { font-size: 0.82rem; color: #777; line-height: 1.6; margin-bottom: 1rem; }
        .plat-footer { display: flex; justify-content: space-between; align-items: center; }
        .plat-prix { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 700; color: #1a1a1a; }
        .btn-cmd {
            background: linear-gradient(135deg, #b8860b, #9a7009);
            color: #fff; border: none; padding: 0.65rem 1.4rem;
            border-radius: 8px; font-size: 0.85rem; font-weight: 500;
            display: inline-flex; align-items: center; gap: 0.5rem;
            text-decoration: none; box-shadow: 0 3px 10px rgba(184,134,11,0.3);
            transition: all 0.2s;
        }
        .btn-cmd:hover { color: #fff; filter: brightness(1.1); }

        /* Features bar sous la carte */
        .features-bar {
            width: 400px; background: #fff;
            border-radius: 16px; border: 1px solid #f0e8d5;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            display: grid; grid-template-columns: repeat(4, 1fr);
            overflow: hidden;
        }
        .feat-item {
            padding: 14px 8px; text-align: center;
            border-right: 1px solid #f0e8d5; transition: background 0.2s;
        }
        .feat-item:last-child { border-right: none; }
        .feat-item:hover { background: #fdf6e3; }
        .feat-item i { font-size: 1.3rem; color: #b8860b; display: block; margin-bottom: 5px; }
        .feat-item span { font-size: 0.68rem; color: #666; font-weight: 500; }

        /* ── SECTION PLATS POPULAIRES ── */
        .section-populaires { padding: 5rem 5rem; background: #fdfaf5; }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.4rem; font-weight: 700; color: #1a1a1a;
            margin-bottom: 6px;
        }
        .section-title span { color: #b8860b; font-style: italic; }
        .section-sub { color: #888; font-size: 0.9rem; margin-bottom: 2.5rem; }

        .card-plat {
            background: #fff; border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            overflow: hidden; transition: all 0.3s;
            border: 1px solid #f0e8d5; height: 100%;
            display: flex; flex-direction: column;
        }
        .card-plat:hover { transform: translateY(-6px); box-shadow: 0 12px 36px rgba(0,0,0,0.13); border-color: #e5c97a; }
        .card-plat img {
            width: 100%; height: 200px;
            object-fit: cover; transition: transform 0.4s;
        }
        .card-plat:hover img { transform: scale(1.06); }
        .card-plat .img-ph {
            width: 100%; height: 200px;
            background: linear-gradient(135deg, #fdf6e3, #f0e0a0);
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem; color: #b8860b; opacity: 0.5;
        }
        .card-plat-body {
            padding: 1rem 1.2rem 1.2rem;
            background: #fff; flex: 1;
            display: flex; flex-direction: column; justify-content: space-between;
        }
        .card-nom {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem; font-weight: 700;
            color: #1a1a1a; margin-bottom: 5px;
        }
        .card-desc { font-size: 0.78rem; color: #888; line-height: 1.5; margin-bottom: 12px; }
        .card-footer-plat {
            display: flex; justify-content: space-between;
            align-items: center; padding-top: 10px;
            border-top: 1px solid #f0e8d5;
        }
        .card-cat { font-size: 0.68rem; color: #b8860b; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .card-footer-plat { display: flex; justify-content: space-between; align-items: center; }
        .card-prix { font-weight: 700; color: #b8860b; font-size: 1rem; }
        .btn-card {
            background: #fdf6e3; color: #b8860b;
            border: 1px solid #e5c97a; padding: 6px 14px;
            border-radius: 8px; font-size: 0.78rem; font-weight: 500;
            text-decoration: none; transition: all 0.2s;
        }
        .btn-card:hover { background: #b8860b; color: #fff; }

        /* ── FOOTER ── */
        .site-footer {
            background: #1a1208; color: #ccc;
            padding: 3rem 5rem 2rem;
        }
        .footer-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: #b8860b; font-weight: 700; }
        .footer-sub { font-size: 0.78rem; color: #888; margin-bottom: 1rem; }
        .footer-links a { color: #888; font-size: 0.82rem; text-decoration: none; display: block; margin-bottom: 6px; }
        .footer-links a:hover { color: #b8860b; }
        .footer-bottom { border-top: 1px solid #2a2010; margin-top: 2rem; padding-top: 1rem; text-align: center; font-size: 0.75rem; color: #555; }
    </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav class="navbar navbar-expand-lg">
    <a class="brand-wrap" href="{{ url('/') }}">
        <div class="brand-icon-box"><i class="fa-solid fa-utensils"></i></div>
        <div class="brand-text">
            <span class="brand-name">SAVEURS DU SÉNÉGAL</span>
            <span class="brand-sub">Cuisine Authentique</span>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navMenu">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.menu') }}">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('reserver') }}">Réserver</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('commandes.create') }}">Commander</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('a-propos') }}">À propos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
    @auth
    <a href="{{ route('admin.categories.index') }}" class="btn-nav-cta ms-3" style="background:linear-gradient(135deg,#1a1208,#3a2a10);">
        <i class="fa-solid fa-gauge"></i> Admin
    </a>
    @endauth
    <a href="{{ route('commandes.create') }}" class="btn-nav-cta ms-3">
        <i class="fa-solid fa-cart-shopping"></i> Commander
    </a>
</nav>

<!-- ═══ HERO ═══ -->
<section class="hero">
    <div class="d-flex justify-content-between align-items-center w-100 gap-5">

        <!-- GAUCHE -->
        <div class="hero-left">
            <div class="hero-tag">
                <i class="fa-solid fa-star" style="font-size:0.6rem;"></i>
                Cuisine Sénégalaise Authentique
            </div>
            <h1>Le Goût<br>Authentique<br>du <em>Sénégal</em></h1>
            <p>Découvrez nos plats traditionnels préparés avec passion, des ingrédients frais et les recettes de nos grands-mères.</p>
            <div class="hero-btns">
                <a href="{{ route('commandes.create') }}" class="btn-primary-hero">
                    <i class="fa-solid fa-bowl-food"></i> Commander maintenant
                </a>
                <a href="{{ route('admin.menu') }}" class="btn-secondary-hero">
                    <i class="fa-solid fa-book-open"></i> Voir le menu
                </a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="stat-num">15+</span>
                    <span class="stat-label">Plats</span>
                </div>
                <div class="hero-stat">
                    <span class="stat-num">100%</span>
                    <span class="stat-label">Authentique</span>
                </div>
                <div class="hero-stat">
                    <span class="stat-num">★ 4.9</span>
                    <span class="stat-label">Note clients</span>
                </div>
            </div>

            {{-- Badges de confiance --}}
            <div style="display:flex;gap:0.8rem;margin-top:1.8rem;flex-wrap:wrap;">
                <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);
                            backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.2);
                            color:#fff;padding:6px 14px;border-radius:20px;font-size:0.72rem;font-weight:500;">
                    <i class="fa-solid fa-mobile-screen" style="color:#f5d98a;"></i> Commande en ligne
                </div>
                <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);
                            backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.2);
                            color:#fff;padding:6px 14px;border-radius:20px;font-size:0.72rem;font-weight:500;">
                    <i class="fa-solid fa-shield-halved" style="color:#f5d98a;"></i> Paiement sécurisé
                </div>
                <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);
                            backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.2);
                            color:#fff;padding:6px 14px;border-radius:20px;font-size:0.72rem;font-weight:500;">
                    <i class="fa-solid fa-thumbs-up" style="color:#f5d98a;"></i> Satisfaction garantie
                </div>
            </div>

            {{-- Témoignages --}}
            <div style="display:flex;flex-direction:column;gap:0.7rem;margin-top:1.5rem;">
                <div style="background:rgba(255,255,255,0.12);backdrop-filter:blur(8px);
                            border:1px solid rgba(255,255,255,0.15);border-radius:14px;
                            padding:0.9rem 1.1rem;max-width:420px;">
                    <div style="display:flex;gap:3px;margin-bottom:5px;">
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                    </div>
                    <p style="font-size:0.78rem;color:rgba(255,255,255,0.85);margin:0;line-height:1.5;font-style:italic;">
                        "Le meilleur Thiéboudienne de Dakar, sans hésitation !"
                    </p>
                    <div style="font-size:0.68rem;color:rgba(255,255,255,0.55);margin-top:5px;font-weight:500;">— Aminata D.</div>
                </div>
                <div style="background:rgba(255,255,255,0.12);backdrop-filter:blur(8px);
                            border:1px solid rgba(255,255,255,0.15);border-radius:14px;
                            padding:0.9rem 1.1rem;max-width:420px;">
                    <div style="display:flex;gap:3px;margin-bottom:5px;">
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                        <i class="fa-solid fa-star" style="color:#f5d98a;font-size:0.7rem;"></i>
                    </div>
                    <p style="font-size:0.78rem;color:rgba(255,255,255,0.85);margin:0;line-height:1.5;font-style:italic;">
                        "Service rapide, plats généreux. Je recommande le Yassa Poulet !"
                    </p>
                    <div style="font-size:0.68rem;color:rgba(255,255,255,0.55);margin-top:5px;font-weight:500;">— Moussa K.</div>
                </div>
            </div>
        </div>

        <!-- CENTRE : badges décoratifs -->
        <div style="position:relative;z-index:2;display:flex;flex-direction:row;gap:1rem;align-items:center;justify-content:center;">
            <div style="background:#fff;border-radius:16px;padding:1rem 1.4rem;box-shadow:0 8px 30px rgba(0,0,0,0.10);border:1px solid #f0e8d5;text-align:center;">
                <i class="fa-solid fa-fire" style="font-size:1.8rem;color:#b8860b;display:block;margin-bottom:6px;"></i>
                <div style="font-weight:700;font-size:0.85rem;">Fait maison</div>
                <div style="font-size:0.72rem;color:#888;">chaque jour</div>
            </div>
            <div style="background:linear-gradient(135deg,#b8860b,#9a7009);border-radius:16px;padding:1rem 1.4rem;box-shadow:0 8px 30px rgba(184,134,11,0.35);text-align:center;">
                <i class="fa-solid fa-truck-fast" style="font-size:1.8rem;color:#fff;display:block;margin-bottom:6px;"></i>
                <div style="font-weight:700;font-size:0.85rem;color:#fff;">Livraison</div>
                <div style="font-size:0.72rem;color:rgba(255,255,255,0.75);">rapide</div>
            </div>
            <div style="background:#fff;border-radius:16px;padding:1rem 1.4rem;box-shadow:0 8px 30px rgba(0,0,0,0.10);border:1px solid #f0e8d5;text-align:center;">
                <i class="fa-solid fa-award" style="font-size:1.8rem;color:#b8860b;display:block;margin-bottom:6px;"></i>
                <div style="font-weight:700;font-size:0.85rem;">Top qualité</div>
                <div style="font-size:0.72rem;color:#888;">garantie</div>
            </div>
        </div>

        <!-- DROITE -->
        <div class="hero-right">
            @php
                try { $platDuJour = \App\Models\Plat::inRandomOrder()->first(); }
                catch (\Exception $e) { $platDuJour = null; }
            @endphp

            <div class="plat-card">
                @if($platDuJour && $platDuJour->image)
                    <img src="{{ asset('storage/' . $platDuJour->image) }}" alt="{{ $platDuJour->nom }}" class="plat-card-img">
                @else
                    <div class="plat-card-img-placeholder"><i class="fa-solid fa-bowl-food"></i></div>
                @endif
                <div class="plat-card-body">
                    <div class="plat-badge"><i class="fa-solid fa-bell-concierge"></i> Plat du jour</div>
                    @if($platDuJour)
                        <div class="plat-nom">{{ $platDuJour->nom }}</div>
                        <div class="plat-type">{{ $platDuJour->categorie->nom ?? '' }}</div>
                        <div class="plat-desc">{{ Str::limit($platDuJour->description, 90) }}</div>
                        <div class="plat-footer">
                            <span class="plat-prix">{{ number_format($platDuJour->prix, 0, ',', ' ') }} FCFA</span>
                            <a href="{{ route('commandes.create') }}" class="btn-cmd">
                                <i class="fa-solid fa-utensils"></i> Commander
                            </a>
                        </div>
                    @else
                        <div class="plat-nom">Thieboudienne</div>
                        <div class="plat-type">Plats de résistance</div>
                        <div class="plat-desc">Le plat national du Sénégal, riz au poisson et légumes.</div>
                        <div class="plat-footer">
                            <span class="plat-prix">3 500 FCFA</span>
                            <a href="{{ route('commandes.create') }}" class="btn-cmd"><i class="fa-solid fa-utensils"></i> Commander</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="features-bar">
                <div class="feat-item"><i class="fa-solid fa-bowl-food"></i><span>Plats savoureux</span></div>
                <div class="feat-item"><i class="fa-solid fa-leaf"></i><span>100% frais</span></div>
                <div class="feat-item"><i class="fa-solid fa-bell-concierge"></i><span>Service rapide</span></div>
                <div class="feat-item"><i class="fa-solid fa-heart"></i><span>Avec amour</span></div>
            </div>
        </div>

    </div>
</section>

<!-- ═══ PLATS POPULAIRES ═══ -->
<section class="section-populaires">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="section-title">Nos <span>Spécialités</span></h2>
            <p class="section-sub">Les plats préférés de nos clients</p>
        </div>
        <a href="{{ route('admin.menu') }}" class="btn-secondary-hero" style="font-size:0.85rem;padding:0.6rem 1.4rem;">
            Voir tout le menu <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
    </div>

    @php
        try { $platsPopulaires = \App\Models\Plat::with('categorie')->inRandomOrder()->limit(6)->get(); }
        catch (\Exception $e) { $platsPopulaires = collect(); }
    @endphp

    <div class="row g-4">

    @forelse($platsPopulaires as $plat)
    <div class="col-md-4">
        <div class="card-plat" 
             data-nom="{{ $plat->nom }}" 
             data-desc="{{ $plat->description }}" 
             data-image="{{ $plat->image ? asset('storage/' . $plat->image) : '' }}" 
             data-prix="{{ number_format($plat->prix, 0, ',', ' ') }} FCFA"
             onclick="openWelcomePlatModal(this)">
            @if($plat->image)
                <img src="{{ asset('storage/' . $plat->image) }}" alt="{{ $plat->nom }}">
            @else
                <div class="img-ph"><i class="fa-solid fa-utensils"></i></div>
            @endif
            <div class="card-plat-body">
                <div class="card-cat">{{ $plat->categorie->nom ?? 'Plat' }}</div>
                <div class="card-nom">{{ $plat->nom }}</div>
                <div class="card-desc">{{ Str::limit($plat->description, 70) }}</div>
                <div class="card-footer-plat">
                    <span class="card-prix">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
                    <a href="{{ route('commandes.create') }}" class="btn-card">
                        <i class="fa-solid fa-cart-plus"></i> Commander
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty

        <div class="col-12 text-center text-muted py-5">Aucun plat disponible pour l'instant.</div>
        @endforelse
    </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer class="site-footer">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="footer-brand"><i class="fa-solid fa-utensils me-2"></i>Saveurs du Sénégal</div>
            <div class="footer-sub">Cuisine Authentique</div>
            <p style="font-size:0.82rem;color:#666;line-height:1.7;">Découvrez le vrai goût du Sénégal, préparé avec passion et des ingrédients frais chaque jour.</p>
        </div>
        <div class="col-md-2 mb-4">
            <div style="font-size:0.75rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#b8860b;margin-bottom:12px;">Navigation</div>
            <div class="footer-links">
                <a href="{{ url('/') }}">Accueil</a>
                <a href="{{ route('admin.menu') }}">Menu</a>
                <a href="{{ route('commandes.create') }}">Commander</a>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div style="font-size:0.75rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#b8860b;margin-bottom:12px;">Horaires</div>
            <div style="font-size:0.82rem;color:#666;line-height:2;">
                Lun – Ven : 11h – 22h<br>
                Sam – Dim : 10h – 23h
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div style="font-size:0.75rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#b8860b;margin-bottom:12px;">Contact</div>
            <div style="font-size:0.82rem;color:#666;line-height:2;">
                <i class="fa-solid fa-location-dot me-2" style="color:#b8860b;"></i>Dakar, Sénégal<br>
                <i class="fa-solid fa-phone me-2" style="color:#b8860b;"></i>+221 77 000 00 00<br>
                <i class="fa-solid fa-envelope me-2" style="color:#b8860b;"></i>contact@saveursdakar.sn
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        © 2025 Saveurs du Sénégal — Tous droits réservés · Projet Laravel ESITEC
    </div>
</footer>

    <!-- Modal Fullscreen Plat Welcome -->
    <div id="welcomePlatModal" class="modal fade" tabindex="-1" style="display:none;">
      <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content rounded-3">
          <div class="modal-header border-0 p-0">
            <button type="button" class="btn-close position-absolute top-3 end-3 z-3" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body p-0 overflow-hidden">
            <div class="position-relative">
              <img id="welcomeModalImage" src="" alt="" class="w-100 h-100vh object-fit-cover d-none">
              <div id="welcomeModalPlaceholder" class="w-100 h-100vh d-flex align-items-center justify-content-center bg-gradient-gold position-absolute top-0 start-0">
                <i class="fa-solid fa-utensils fa-5x opacity-40 text-gold"></i>
              </div>
            </div>
            <div class="p-5 bg-white">
              <div class="text-center mb-5">
                <h1 id="welcomeModalNom" class="display-4 font-serif fw-bold text-dark mb-3"></h1>
                <div id="welcomeModalPrix" class="fs-2 font-serif fw-bold text-gold mb-4"></div>
              </div>
              <div id="welcomeModalDesc" class="fs-5 text-muted lh-lg"></div>
              <div class="mt-5 d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="{{ route('commandes.create') }}" class="btn btn-lg btn-warning shadow-lg px-5 py-3 fs-6 fw-medium">
                  <i class="fa-solid fa-cart-plus me-2"></i>Commander
                </a>
                <button type="button" class="btn btn-outline-secondary btn-lg px-5 py-3 fs-6 fw-medium" data-bs-dismiss="modal">
                  <i class="fa-solid fa-xmark me-2"></i>Fermer
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
    .modal-fullscreen-sm-down .modal-dialog { margin: 0; max-width: 100vw; height: 100vh; }
    .modal-fullscreen-sm-down .modal-content { height: 100vh; border-radius: 0; }
    .h-100vh { height: 60vh !important; }
    @media (min-width: 576px) { .h-100vh { height: 70vh !important; } }
    </style>

    <script>
    function openWelcomePlatModal(card) {
      const modal = new bootstrap.Modal(document.getElementById('welcomePlatModal'));
      document.getElementById('welcomeModalNom').textContent = card.dataset.nom;
      document.getElementById('welcomeModalDesc').innerHTML = card.dataset.desc.replace(/\\n/g, '<br>');
      document.getElementById('welcomeModalPrix').textContent = card.dataset.prix;
      
      const img = document.getElementById('welcomeModalImage');
      const placeholder = document.getElementById('welcomeModalPlaceholder');
      const imageSrc = card.dataset.image;
      
      if (imageSrc) {
        img.src = imageSrc;
        img.onload = () => {
          img.classList.remove('d-none');
          placeholder.style.display = 'none';
        };
        img.onerror = () => {
          img.classList.add('d-none');
          placeholder.style.display = 'flex';
        };
      } else {
        img.classList.add('d-none');
        placeholder.style.display = 'flex';
      }
      
      modal.show();
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>