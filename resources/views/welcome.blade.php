<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saveurs du Sénégal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body { font-family: 'Georgia', serif; background: #fff; color: #1a1a1a; }

        /* NAVBAR */
        .navbar { padding: 1.2rem 3rem; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .navbar-brand { display: flex; flex-direction: column; line-height: 1.1; }
        .navbar-brand .brand-icon { font-size: 1.5rem; color: #b8860b; }
        .navbar-brand .brand-name { font-size: 1.1rem; font-weight: 700; color: #1a1a1a; letter-spacing: 1px; }
        .navbar-brand .brand-sub { font-size: 0.7rem; color: #b8860b; letter-spacing: 2px; }
        .nav-link { color: #1a1a1a !important; font-size: 0.9rem; margin: 0 0.5rem; transition: color 0.2s; }
        .nav-link:hover, .nav-link.active { color: #b8860b !important; }
        .nav-link.active { border-bottom: 2px solid #b8860b; }
        .btn-reserve-nav {
            background: #b8860b; color: #fff; border: none;
            padding: 0.6rem 1.4rem; border-radius: 6px; font-size: 0.9rem;
            transition: background 0.2s; text-decoration: none;
        }
        .btn-reserve-nav:hover { background: #9a7009; color: #fff; }

        /* HERO */
        .hero {
            min-height: 88vh;
            background: linear-gradient(135deg, #fff 55%, #fdf6e3 100%);
            display: flex; align-items: center;
            position: relative; overflow: hidden;
            padding: 3rem;
        }
        .hero::before {
            content: '';
            position: absolute; bottom: 0; left: 0;
            width: 100%; height: 220px;
            background: linear-gradient(135deg, #8b0000 0%, #b8860b 60%, #f5d98a 100%);
            clip-path: ellipse(60% 100% at 20% 100%);
            z-index: 0;
        }
        .hero-left { position: relative; z-index: 1; max-width: 480px; }
        .hero-left h1 { font-size: 3.2rem; font-weight: 800; line-height: 1.1; color: #1a1a1a; }
        .hero-left h1 span { color: #b8860b; }
        .hero-left p { color: #555; font-size: 1rem; margin: 1.2rem 0 2rem; line-height: 1.7; }

        .btn-commander {
            background: #b8860b; color: #fff; border: none;
            padding: 0.8rem 1.8rem; border-radius: 8px; font-size: 0.95rem;
            margin-right: 1rem; transition: background 0.2s;
            text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;
        }
        .btn-commander:hover { background: #9a7009; color: #fff; }
        .btn-reserver {
            background: transparent; color: #1a1a1a;
            border: 2px solid #1a1a1a; padding: 0.8rem 1.8rem;
            border-radius: 8px; font-size: 0.95rem; transition: all 0.2s;
            text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;
        }
        .btn-reserver:hover { background: #1a1a1a; color: #fff; }

        .hero-badges { display: flex; gap: 2rem; margin-top: 2.5rem; }
        .hero-badge { text-align: center; }
        .hero-badge i { font-size: 1.4rem; color: #b8860b; display: block; margin-bottom: 0.3rem; }
        .hero-badge .badge-title { font-weight: 700; font-size: 0.85rem; }
        .hero-badge .badge-sub { font-size: 0.75rem; color: #888; }

        /* CARTE PLAT DU JOUR */
        .plat-card {
            background: #fff; border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            padding: 2rem; max-width: 420px; width: 100%;
            position: relative; z-index: 1;
        }
        .plat-card .plat-icon { font-size: 2rem; color: #b8860b; margin-bottom: 0.5rem; }
        .plat-card .plat-label { font-size: 1.1rem; color: #555; margin-bottom: 1rem; }
        .plat-card .plat-nom { font-size: 1.8rem; font-weight: 700; color: #b8860b; }
        .plat-card .plat-type { font-size: 0.95rem; color: #888; margin-bottom: 0.7rem; }
        .plat-card .plat-desc { font-size: 0.85rem; color: #666; line-height: 1.6; margin-bottom: 1.2rem; }
        .plat-card .plat-prix { font-size: 1.6rem; font-weight: 800; color: #1a1a1a; margin-bottom: 1.2rem; }
        .plat-img {
            width: 160px; height: 160px; border-radius: 50%;
            object-fit: cover; float: right; margin: -1rem -1rem 1rem 1rem;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .btn-cmd-plat {
            background: #b8860b; color: #fff; border: none;
            padding: 0.7rem 1.5rem; border-radius: 8px;
            font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem;
            text-decoration: none; transition: background 0.2s;
        }
        .btn-cmd-plat:hover { background: #9a7009; color: #fff; }

        /* FEATURES BAS */
        .features {
            background: #fff; border-top: 1px solid #eee;
            padding: 1.5rem 3rem;
            display: flex; justify-content: center; gap: 4rem;
        }
        .feature-item { text-align: center; }
        .feature-item i { font-size: 1.8rem; color: #b8860b; margin-bottom: 0.4rem; display: block; }
        .feature-item span { font-size: 0.85rem; color: #555; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">
        <span class="brand-icon"><i class="fa-solid fa-utensils"></i></span>
        <span class="brand-name">SAVEURS DU SÉNÉGAL</span>
        <span class="brand-sub">Cuisine Authentique</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navMenu">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Réserver</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Commander</a></li>
            <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
    </div>
    <a href="#" class="btn-reserve-nav ms-3">
        <i class="fa-solid fa-cart-shopping me-1"></i> Réserver une table
    </a>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-4">

        <!-- GAUCHE -->
        <div class="hero-left">
            <h1>Le Goût Authentique<br><span>du Sénégal</span></h1>
            <p>Découvrez nos plats traditionnels préparés<br>avec passion et des ingrédients frais.</p>
            <div>
                <a href="#" class="btn-commander">
                    <i class="fa-solid fa-truck"></i> Commander maintenant
                </a>
                <a href="#" class="btn-reserver">
                    <i class="fa-regular fa-calendar-plus"></i> Réserver une table
                </a>
            </div>
            <div class="hero-badges">
                <div class="hero-badge">
                    <i class="fa-solid fa-leaf"></i>
                    <div class="badge-title">Ingrédients frais</div>
                    <div class="badge-sub">100% naturels</div>
                </div>
                <div class="hero-badge">
                    <i class="fa-solid fa-hat-chef"></i>
                    <div class="badge-title">Recettes</div>
                    <div class="badge-sub">traditionnelles</div>
                </div>
                <div class="hero-badge">
                    <i class="fa-regular fa-heart"></i>
                    <div class="badge-title">Préparé</div>
                    <div class="badge-sub">avec amour</div>
                </div>
            </div>
        </div>

        <!-- DROITE : PLAT DU JOUR -->
        <div class="plat-card">

            @php
                try {
                    $platDuJour = \App\Models\Plat::inRandomOrder()->first();
                } catch (\Exception $e) {
                    $platDuJour = null;
                }
            @endphp

            <div class="plat-icon"><i class="fa-solid fa-bell-concierge"></i></div>
            <div class="plat-label">Plat du jour</div>

            @if($platDuJour)
                @if($platDuJour->image)
                    <img src="{{ asset('storage/' . $platDuJour->image) }}"
                         alt="{{ $platDuJour->nom }}" class="plat-img">
                @endif
                <div class="plat-nom">{{ $platDuJour->nom }}</div>
                <div class="plat-type">{{ $platDuJour->categorie->nom ?? '' }}</div>
                <div class="plat-desc">{{ $platDuJour->description }}</div>
                <div class="plat-prix">{{ number_format($platDuJour->prix, 0, ',', ' ') }} FCFA</div>
            @else
                <div class="plat-nom">Thieboudienne</div>
                <div class="plat-type">Riz au poisson</div>
                <div class="plat-desc">Le plat national du Sénégal à base de riz, poisson, légumes et sauces savoureuses.</div>
                <div class="plat-prix">3 500 FCFA</div>
            @endif

            <a href="#" class="btn-cmd-plat">
                <i class="fa-solid fa-utensils"></i> Commander
            </a>
        </div>

    </div>
</section>

<!-- FEATURES -->
<div class="features">
    <div class="feature-item">
        <i class="fa-solid fa-bowl-food"></i>
        <span>Plats savoureux</span>
    </div>
    <div class="feature-item">
        <i class="fa-solid fa-glass-water"></i>
        <span>Boissons fraîches</span>
    </div>
    <div class="feature-item">
        <i class="fa-solid fa-bell-concierge"></i>
        <span>Service rapide</span>
    </div>
    <div class="feature-item">
        <i class="fa-solid fa-people-group"></i>
        <span>Ambiance conviviale</span>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>