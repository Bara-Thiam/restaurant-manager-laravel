<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une table — Saveurs du Sénégal</title>
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
            padding: 5rem 5rem 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .page-hero::after {
            content: '';
            position: absolute; bottom: -1px; left: 0; right: 0; height: 60px;
            background: #fff;
            clip-path: ellipse(55% 100% at 50% 100%);
        }
        .page-hero-tag {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(201,168,76,0.18); border: 1px solid rgba(201,168,76,0.4);
            color: #f5d98a; font-size: 0.7rem; font-weight: 600;
            letter-spacing: 3px; text-transform: uppercase;
            padding: 6px 18px; border-radius: 20px; margin-bottom: 18px;
        }
        .page-hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.5rem; font-weight: 700; color: #fff; margin-bottom: 12px;
        }
        .page-hero h1 em { color: #f5d98a; font-style: italic; }
        .page-hero p { color: rgba(255,255,255,0.7); font-size: 1rem; max-width: 500px; margin: 0 auto; }

        /* ── SECTION RÉSERVATION ── */
        .reservation-section { padding: 5rem 5rem; background: #fdfaf5; }

        .reservation-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
            border: 1px solid #f0e8d5;
            overflow: hidden;
            max-width: 700px;
            margin: 0 auto;
        }
        .reservation-card-header {
            background: linear-gradient(135deg, #b8860b, #9a7009);
            padding: 2rem 2.5rem;
            color: #fff;
        }
        .reservation-card-header h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem; font-weight: 700; margin-bottom: 4px;
        }
        .reservation-card-header p { font-size: 0.85rem; opacity: 0.8; margin: 0; }

        .form-body { padding: 2.5rem; }

        .form-label-custom {
            font-size: 0.75rem; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            color: #b8860b; margin-bottom: 8px; display: block;
        }
        .form-control-custom {
            width: 100%; background: #fdfaf5;
            border: 1.5px solid #e5d9bb; color: #1a1a1a;
            border-radius: 10px; padding: 12px 16px;
            font-size: 0.9rem; font-family: 'Outfit', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control-custom:focus {
            outline: none; border-color: #b8860b;
            box-shadow: 0 0 0 3px rgba(184,134,11,0.1); background: #fff;
        }
        .form-group-custom { margin-bottom: 20px; }

        .btn-reserver {
            background: linear-gradient(135deg, #b8860b, #9a7009);
            color: #fff; border: none; padding: 14px 32px;
            border-radius: 10px; font-family: 'Outfit', sans-serif;
            font-weight: 600; font-size: 1rem; cursor: pointer;
            width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px;
            box-shadow: 0 4px 16px rgba(184,134,11,0.35);
            transition: all 0.2s;
        }
        .btn-reserver:hover { filter: brightness(1.08); transform: translateY(-1px); box-shadow: 0 6px 22px rgba(184,134,11,0.45); }

        .info-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 3rem; max-width: 700px; margin-left: auto; margin-right: auto; }
        .info-card {
            background: #fff; border-radius: 16px;
            border: 1px solid #f0e8d5; padding: 1.5rem;
            text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            transition: all 0.25s;
        }
        .info-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,0.09); border-color: #e5c97a; }
        .info-card i { font-size: 1.8rem; color: #b8860b; margin-bottom: 10px; display: block; }
        .info-card-title { font-weight: 700; font-size: 0.9rem; color: #1a1a1a; margin-bottom: 4px; }
        .info-card-sub { font-size: 0.78rem; color: #888; }

        /* ── CONFIRMATION MODAL ── */
        .modal-overlay {
            display: none; position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,0.6); align-items: center; justify-content: center;
        }
        .modal-box {
            background: #fff; border-radius: 20px;
            padding: 3rem; max-width: 420px; width: 90%;
            text-align: center; box-shadow: 0 30px 80px rgba(0,0,0,0.25);
        }
        .modal-icon { font-size: 3.5rem; color: #2d6a4f; margin-bottom: 1rem; }
        .modal-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 700; color: #1a1a1a; margin-bottom: 8px; }
        .modal-sub { color: #666; font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem; }
        .btn-modal-close {
            background: linear-gradient(135deg, #b8860b, #9a7009);
            color: #fff; border: none; padding: 12px 28px;
            border-radius: 10px; font-family: 'Outfit', sans-serif;
            font-weight: 600; cursor: pointer; font-size: 0.9rem;
        }

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
            <li class="nav-item"><a class="nav-link active" href="{{ route('reserver') }}">Réserver</a></li>
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

<!-- ═══ PAGE HERO ═══ -->
<section class="page-hero">
    <div class="page-hero-tag"><i class="fa-solid fa-star" style="font-size:0.6rem;"></i> Réservation de table</div>
    <h1>Réservez votre <em>table</em></h1>
    <p>Garantissez votre place et profitez d'une expérience culinaire authentique en toute sérénité.</p>
</section>

<!-- ═══ FORMULAIRE ═══ -->
<section class="reservation-section">

    <div class="reservation-card">
        <div class="reservation-card-header">
            <h2><i class="fa-solid fa-calendar-check me-2"></i>Nouvelle réservation</h2>
            <p>Remplissez le formulaire ci-dessous. Nous confirmerons votre réservation par téléphone.</p>
        </div>
        <div class="form-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nom complet *</label>
                        <input type="text" class="form-control-custom" placeholder="Ex : Aminata Diallo" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Téléphone *</label>
                        <input type="tel" class="form-control-custom" placeholder="Ex : +221 77 000 00 00" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Date *</label>
                        <input type="date" class="form-control-custom" min="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Heure *</label>
                        <select class="form-control-custom" required>
                            <option value="">-- Choisir --</option>
                            <option>11h00</option><option>11h30</option>
                            <option>12h00</option><option>12h30</option>
                            <option>13h00</option><option>13h30</option>
                            <option>14h00</option><option>19h00</option>
                            <option>19h30</option><option>20h00</option>
                            <option>20h30</option><option>21h00</option>
                            <option>21h30</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nombre de personnes *</label>
                        <select class="form-control-custom" required>
                            <option value="">-- Choisir --</option>
                            <option>1 personne</option><option>2 personnes</option>
                            <option>3 personnes</option><option>4 personnes</option>
                            <option>5 personnes</option><option>6 personnes</option>
                            <option>7 personnes</option><option>8 personnes</option>
                            <option>Plus de 8 (groupe)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Occasion</label>
                        <select class="form-control-custom">
                            <option value="">-- Optionnel --</option>
                            <option>Déjeuner d'affaires</option>
                            <option>Anniversaire</option>
                            <option>Repas en famille</option>
                            <option>Romantique</option>
                            <option>Entre amis</option>
                            <option>Autre</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Message (optionnel)</label>
                        <textarea class="form-control-custom" rows="3" placeholder="Allergies, préférences, demandes spéciales..."></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn-reserver" onclick="confirmerReservation()">
                        <i class="fa-solid fa-calendar-check"></i> Confirmer la réservation
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Info cards -->
    <div class="info-cards">
        <div class="info-card">
            <i class="fa-solid fa-clock"></i>
            <div class="info-card-title">Horaires</div>
            <div class="info-card-sub">Lun–Ven : 11h–22h<br>Sam–Dim : 10h–23h</div>
        </div>
        <div class="info-card">
            <i class="fa-solid fa-phone"></i>
            <div class="info-card-title">Confirmation</div>
            <div class="info-card-sub">Nous vous rappelons dans les 2h pour confirmer</div>
        </div>
        <div class="info-card">
            <i class="fa-solid fa-xmark"></i>
            <div class="info-card-title">Annulation</div>
            <div class="info-card-sub">Gratuite jusqu'à 2h avant l'heure réservée</div>
        </div>
    </div>

</section>

<!-- ═══ MODAL CONFIRMATION ═══ -->
<div class="modal-overlay" id="confirmModal" onclick="fermerModal()">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-icon"><i class="fa-solid fa-circle-check"></i></div>
        <div class="modal-title">Réservation envoyée !</div>
        <div class="modal-sub">Merci pour votre réservation. Notre équipe vous contactera dans les 2 heures pour confirmer votre table.</div>
        <button class="btn-modal-close" onclick="fermerModal()">
            <i class="fa-solid fa-check me-2"></i>Parfait, merci !
        </button>
    </div>
</div>

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
<script>
function confirmerReservation() {
    document.getElementById('confirmModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function fermerModal() {
    document.getElementById('confirmModal').style.display = 'none';
    document.body.style.overflow = '';
}
</script>
</body>
</html>