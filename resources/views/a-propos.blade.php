<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos — Saveurs du Sénégal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; background: #fff; color: #1a1a1a; }

        /* ── NAVBAR ── */
        .navbar { padding: 1rem 3rem; background: #fff; box-shadow: 0 2px 16px rgba(0,0,0,0.06); position: sticky; top: 0; z-index: 100; }
        .brand-wrap { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .brand-icon-box { width: 44px; height: 44px; background: linear-gradient(135deg, #b8860b, #8b6400); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.2rem; box-shadow: 0 3px 10px rgba(184,134,11,0.35); }
        .brand-text .brand-name { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 700; color: #1a1a1a; letter-spacing: 1px; display: block; }
        .brand-text .brand-sub { font-size: 0.65rem; color: #b8860b; letter-spacing: 2.5px; text-transform: uppercase; }
        .nav-link { color: #444 !important; font-size: 0.88rem; font-weight: 500; margin: 0 0.3rem; padding: 0.5rem 0.8rem !important; border-radius: 6px; transition: all 0.2s; }
        .nav-link:hover { color: #b8860b !important; background: #fdf6e3; }
        .nav-link.active { color: #b8860b !important; font-weight: 600; }
        .btn-nav-cta { background: linear-gradient(135deg, #b8860b, #9a7009); color: #fff; border: none; padding: 0.6rem 1.4rem; border-radius: 8px; font-size: 0.88rem; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; box-shadow: 0 3px 12px rgba(184,134,11,0.35); transition: all 0.2s; }
        .btn-nav-cta:hover { color: #fff; filter: brightness(1.1); transform: translateY(-1px); }

        /* ── PAGE HERO ── */
        .page-hero {
            background: linear-gradient(135deg, #3d0a0a 0%, #6b1a1a 50%, #8b6400 100%);
            padding: 5rem 5rem 4rem; text-align: center;
            position: relative; overflow: hidden;
        }
        .page-hero::after {
            content: ''; position: absolute; bottom: -1px; left: 0; right: 0; height: 60px;
            background: #fff; clip-path: ellipse(55% 100% at 50% 100%);
        }
        .page-hero-tag {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(201,168,76,0.18); border: 1px solid rgba(201,168,76,0.4);
            color: #f5d98a; font-size: 0.7rem; font-weight: 600;
            letter-spacing: 3px; text-transform: uppercase;
            padding: 6px 18px; border-radius: 20px; margin-bottom: 18px;
        }
        .page-hero h1 { font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; color: #fff; margin-bottom: 12px; }
        .page-hero h1 em { color: #f5d98a; font-style: italic; }
        .page-hero p { color: rgba(255,255,255,0.7); font-size: 1rem; max-width: 500px; margin: 0 auto; }

        /* ── HISTOIRE ── */
        .section { padding: 5rem; }
        .section-alt { background: #fdfaf5; }
        .section-title { font-family: 'Cormorant Garamond', serif; font-size: 2.4rem; font-weight: 700; color: #1a1a1a; margin-bottom: 6px; }
        .section-title span { color: #b8860b; font-style: italic; }
        .section-sub { color: #888; font-size: 0.9rem; margin-bottom: 2rem; }
        .section-text { color: #555; font-size: 0.95rem; line-height: 1.9; }

        .story-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: #fdf6e3; border: 1px solid #e5c97a;
            color: #b8860b; font-size: 0.7rem; font-weight: 600;
            letter-spacing: 2px; text-transform: uppercase;
            padding: 6px 16px; border-radius: 20px; margin-bottom: 16px;
        }

        /* Chiffres clés */
        .chiffres { display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; margin-top: 3rem; }
        .chiffre-card {
            background: #fff; border-radius: 16px; padding: 2rem 1.5rem;
            text-align: center; border: 1px solid #f0e8d5;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05); transition: all 0.25s;
        }
        .chiffre-card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(0,0,0,0.08); border-color: #e5c97a; }
        .chiffre-num { font-family: 'Cormorant Garamond', serif; font-size: 3rem; font-weight: 700; color: #b8860b; line-height: 1; }
        .chiffre-label { font-size: 0.8rem; color: #888; margin-top: 6px; font-weight: 500; }

        /* Équipe */
        .team-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 24px; }
        .team-card {
            background: #fff; border-radius: 20px;
            border: 1px solid #f0e8d5; overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06); transition: all 0.3s;
        }
        .team-card:hover { transform: translateY(-5px); box-shadow: 0 12px 36px rgba(0,0,0,0.1); border-color: #e5c97a; }
        .team-avatar {
            height: 180px;
            display: flex; align-items: center; justify-content: center;
            font-size: 4rem;
        }
        .team-avatar.gold { background: linear-gradient(135deg, #fdf6e3, #f0e0a0); }
        .team-avatar.bordeaux { background: linear-gradient(135deg, #fde8e8, #f5b8b8); }
        .team-avatar.dark { background: linear-gradient(135deg, #e8e8f0, #c8c8e0); }
        .team-body { padding: 1.5rem; }
        .team-name { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 700; color: #1a1a1a; margin-bottom: 4px; }
        .team-role { font-size: 0.75rem; color: #b8860b; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 10px; }
        .team-desc { font-size: 0.82rem; color: #888; line-height: 1.6; }

        /* Valeurs */
        .valeurs-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 20px; }
        .valeur-card {
            display: flex; gap: 16px; align-items: flex-start;
            background: #fff; border-radius: 16px; padding: 1.5rem;
            border: 1px solid #f0e8d5; box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            transition: all 0.25s;
        }
        .valeur-card:hover { border-color: #e5c97a; box-shadow: 0 8px 28px rgba(0,0,0,0.08); }
        .valeur-icon {
            width: 52px; height: 52px; min-width: 52px; border-radius: 12px;
            background: linear-gradient(135deg, #b8860b, #9a7009);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.2rem;
            box-shadow: 0 3px 10px rgba(184,134,11,0.3);
        }
        .valeur-title { font-weight: 700; font-size: 1rem; color: #1a1a1a; margin-bottom: 6px; }
        .valeur-desc { font-size: 0.82rem; color: #888; line-height: 1.6; }

        /* CTA */
        .cta-section {
            background: linear-gradient(135deg, #3d0a0a 0%, #6b1a1a 60%, #8b6400 100%);
            padding: 5rem; text-align: center;
        }
        .cta-section h2 { font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; font-weight: 700; color: #fff; margin-bottom: 12px; }
        .cta-section h2 em { color: #f5d98a; font-style: italic; }
        .cta-section p { color: rgba(255,255,255,0.7); font-size: 1rem; margin-bottom: 2rem; }
        .btn-cta-white {
            background: #fff; color: #1a1a1a; border: none;
            padding: 14px 32px; border-radius: 10px;
            font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 1rem;
            text-decoration: none; display: inline-flex; align-items: center; gap: 10px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.2); transition: all 0.2s; margin: 0 8px;
        }
        .btn-cta-white:hover { color: #b8860b; transform: translateY(-2px); }
        .btn-cta-outline {
            background: transparent; color: #fff; border: 2px solid rgba(255,255,255,0.4);
            padding: 14px 32px; border-radius: 10px;
            font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 1rem;
            text-decoration: none; display: inline-flex; align-items: center; gap: 10px;
            transition: all 0.2s; margin: 0 8px;
        }
        .btn-cta-outline:hover { border-color: #fff; color: #fff; background: rgba(255,255,255,0.1); }

        /* ── FOOTER ── */
        .site-footer { background: #1a1208; color: #ccc; padding: 3rem 5rem 2rem; }
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
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.menu') }}">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('reserver') }}">Réserver</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('commandes.create') }}">Commander</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('a-propos') }}">À propos</a></li>
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
<section class="page-hero">
    <div class="page-hero-tag"><i class="fa-solid fa-star" style="font-size:0.6rem;"></i> Notre histoire</div>
    <h1>À propos de <em>nous</em></h1>
    <p>Une passion pour la cuisine sénégalaise, transmise de génération en génération depuis 1998.</p>
</section>

<!-- ═══ HISTOIRE ═══ -->
<section class="section">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <div class="story-badge"><i class="fa-solid fa-book-open"></i> Notre histoire</div>
            <h2 class="section-title">Nés de la <span>passion</span><br>pour le Sénégal</h2>
            <p class="section-text mt-3">
                Saveurs du Sénégal est né en 1998 d'un rêve simple : partager les saveurs authentiques de la cuisine sénégalaise avec le plus grand nombre. Fondé par la famille Diallo à Dakar, le restaurant a grandi autour d'une cuisine ouverte où chaque plat raconte une histoire.
            </p>
            <p class="section-text mt-3">
                Nos recettes sont celles de nos grand-mères — thiéboudienne, yassa, mafé — préparées chaque jour avec des ingrédients frais achetés au marché Sandaga. Nous croyons que la nourriture est un acte d'amour, et c'est avec cet esprit que nous accueillons nos clients depuis plus de 25 ans.
            </p>
            <p class="section-text mt-3">
                Aujourd'hui, Saveurs du Sénégal est bien plus qu'un restaurant. C'est un espace culturel où la gastronomie rencontre l'hospitalité légendaire du Sénégal — la <em style="color:#b8860b;">téranga</em>.
            </p>
        </div>
        <div class="col-lg-6">
            <div style="background:linear-gradient(135deg,#fdf6e3,#f0e8c0);border-radius:24px;padding:3rem;text-align:center;border:1px solid #e5c97a;position:relative;overflow:hidden;">
                <div style="position:absolute;top:-20px;right:-20px;width:120px;height:120px;background:radial-gradient(circle,rgba(184,134,11,0.15),transparent);border-radius:50%;"></div>
                <i class="fa-solid fa-utensils" style="font-size:5rem;color:#b8860b;opacity:0.3;margin-bottom:1.5rem;display:block;"></i>
                <div style="font-family:'Cormorant Garamond',serif;font-size:1.6rem;font-weight:700;color:#1a1a1a;margin-bottom:8px;">« La téranga avant tout »</div>
                <div style="font-size:0.85rem;color:#888;line-height:1.7;">L'hospitalité sénégalaise — <em>la téranga</em> — est au cœur de tout ce que nous faisons. Chaque client est un invité, chaque repas une célébration.</div>
                <div style="margin-top:1.5rem;font-size:0.75rem;color:#b8860b;font-weight:600;letter-spacing:1px;">— Famille Diallo, fondateurs</div>
            </div>
        </div>
    </div>

    <!-- Chiffres clés -->
    <div class="chiffres">
        <div class="chiffre-card">
            <div class="chiffre-num">25+</div>
            <div class="chiffre-label">Années d'expérience</div>
        </div>
        <div class="chiffre-card">
            <div class="chiffre-num">12</div>
            <div class="chiffre-label">Plats authentiques</div>
        </div>
        <div class="chiffre-card">
            <div class="chiffre-num">★ 4.9</div>
            <div class="chiffre-label">Note moyenne clients</div>
        </div>
        <div class="chiffre-card">
            <div class="chiffre-num">50k+</div>
            <div class="chiffre-label">Clients satisfaits</div>
        </div>
    </div>
</section>

<!-- ═══ ÉQUIPE ═══ -->
<section class="section section-alt">
    <div class="text-center mb-5">
        <div class="story-badge" style="margin:0 auto 16px;width:fit-content;"><i class="fa-solid fa-users"></i> Notre équipe</div>
        <h2 class="section-title">Les <span>visages</span> de Saveurs</h2>
        <p class="section-sub">Des passionnés au service de votre plaisir</p>
    </div>
    <div class="team-grid">
        <div class="team-card">
            <div class="team-avatar gold"><i class="fa-solid fa-crown" style="color:#b8860b;"></i></div>
            <div class="team-body">
                <div class="team-name">Fatou Diallo</div>
                <div class="team-role">Fondatrice & Chef exécutive</div>
                <div class="team-desc">30 ans d'expérience dans la cuisine sénégalaise. Formée à Dakar et Paris, Fatou perpétue les traditions culinaires de sa région natale avec une touche contemporaine.</div>
            </div>
        </div>
        <div class="team-card">
            <div class="team-avatar bordeaux"><i class="fa-solid fa-fire-burner" style="color:#b8860b;"></i></div>
            <div class="team-body">
                <div class="team-name">Moussa Sow</div>
                <div class="team-role">Chef de cuisine</div>
                <div class="team-desc">Spécialiste des grillades et plats en sauce, Moussa apporte 15 ans d'expertise dans les restaurants étoilés de Dakar et Saint-Louis.</div>
            </div>
        </div>
        <div class="team-card">
            <div class="team-avatar dark"><i class="fa-solid fa-star" style="color:#b8860b;"></i></div>
            <div class="team-body">
                <div class="team-name">Aminata Ndiaye</div>
                <div class="team-role">Responsable service & accueil</div>
                <div class="team-desc">Ambassadrice de la téranga, Aminata veille à ce que chaque client se sente comme à la maison. Son sourire est la première chose que vous verrez en arrivant.</div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ VALEURS ═══ -->
<section class="section">
    <div class="row align-items-center g-5">
        <div class="col-lg-5">
            <div class="story-badge"><i class="fa-solid fa-heart"></i> Nos valeurs</div>
            <h2 class="section-title">Ce qui nous <span>guide</span></h2>
            <p class="section-text mt-3">Chaque décision que nous prenons — du choix des ingrédients à la façon dont nous accueillons nos clients — est guidée par des valeurs fortes, enracinées dans la culture sénégalaise.</p>
        </div>
        <div class="col-lg-7">
            <div class="valeurs-grid">
                <div class="valeur-card">
                    <div class="valeur-icon"><i class="fa-solid fa-leaf"></i></div>
                    <div>
                        <div class="valeur-title">Fraîcheur & qualité</div>
                        <div class="valeur-desc">Nos ingrédients sont achetés chaque matin au marché. Aucun produit congelé, aucun compromis sur la qualité.</div>
                    </div>
                </div>
                <div class="valeur-card">
                    <div class="valeur-icon"><i class="fa-solid fa-hands-holding-heart"></i></div>
                    <div>
                        <div class="valeur-title">La téranga</div>
                        <div class="valeur-desc">L'hospitalité est notre ADN. Chaque client est reçu comme un membre de la famille, avec chaleur et générosité.</div>
                    </div>
                </div>
                <div class="valeur-card">
                    <div class="valeur-icon"><i class="fa-solid fa-book"></i></div>
                    <div>
                        <div class="valeur-title">Authenticité</div>
                        <div class="valeur-desc">Nos recettes sont celles de nos ancêtres, transmises oralement et préservées dans leur forme la plus pure.</div>
                    </div>
                </div>
                <div class="valeur-card">
                    <div class="valeur-icon"><i class="fa-solid fa-seedling"></i></div>
                    <div>
                        <div class="valeur-title">Durabilité</div>
                        <div class="valeur-desc">Nous favorisons les producteurs locaux et les circuits courts pour soutenir l'économie dakaroise et réduire notre impact environnemental.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="cta-section">
    <h2>Venez vivre <em>l'expérience</em></h2>
    <p>Réservez votre table et laissez-nous vous faire voyager à travers les saveurs du Sénégal.</p>
    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
        <a href="{{ route('reserver') }}" class="btn-cta-white">
            <i class="fa-solid fa-calendar-check"></i> Réserver une table
        </a>
        <a href="{{ route('admin.menu') }}" class="btn-cta-outline">
            <i class="fa-solid fa-book-open"></i> Voir le menu
        </a>
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
                <a href="{{ route('reserver') }}">Réserver</a>
                <a href="{{ route('commandes.create') }}">Commander</a>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div style="font-size:0.75rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#b8860b;margin-bottom:12px;">Horaires</div>
            <div style="font-size:0.82rem;color:#666;line-height:2;">Lun – Ven : 11h – 22h<br>Sam – Dim : 10h – 23h</div>
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
    <div class="footer-bottom">© 2025 Saveurs du Sénégal — Tous droits réservés · Projet Laravel ESITEC</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>