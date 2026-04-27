<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Admin') — Saveurs du Sénégal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root {
  --cream:        #fdfaf5;
  --white:        #ffffff;
  --gold:         #8B6914;
  --gold-mid:     #a07820;
  --gold-light:   #c9a84c;
  --gold-pale:    #f7f0dc;
  --bordeaux:     #6B1A1A;
  --bordeaux-dk:  #3d0a0a;
  --text:         #1c1208;
  --text-soft:    #6b4c20;
  --border:       #e5d9bb;
  --green:        #2d6a4f;
  --red:          #c0392b;
  --shadow:       0 2px 20px rgba(139,105,20,0.10);
  --shadow-hover: 0 8px 32px rgba(139,105,20,0.20);
}

* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Outfit', sans-serif; background: var(--cream); color: var(--text); min-height: 100vh; }

/* ===== TOPNAV ===== */
.topnav {
  background: var(--white);
  border-bottom: 2px solid var(--gold-pale);
  padding: 0 32px;
  height: 68px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky; top: 0; z-index: 100;
  box-shadow: 0 2px 16px rgba(139,105,20,0.10);
}
.brand {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.45rem; font-weight: 700;
  color: var(--gold);
  display: flex; align-items: center; gap: 12px;
  letter-spacing: 0.3px; text-decoration: none;
}
.brand-icon {
  width: 40px; height: 40px;
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  color: white; font-size: 1.1rem;
  box-shadow: 0 2px 8px rgba(139,105,20,0.3);
}
.brand-sub {
  font-size: 0.7rem; color: var(--text-soft); font-weight: 400;
  letter-spacing: 1px; text-transform: uppercase; display: block; margin-top: -2px;
}
.nav-user {
  display: flex; align-items: center; gap: 10px;
  background: var(--gold-pale);
  border: 1px solid var(--gold-light);
  padding: 6px 18px 6px 8px;
  border-radius: 50px;
}
.avatar {
  width: 32px; height: 32px;
  background: linear-gradient(135deg, var(--gold) 0%, var(--bordeaux) 100%);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  color: white; font-size: 0.75rem; font-weight: 600;
}
.nav-user-name { font-size: 0.85rem; font-weight: 500; color: var(--text); }
.nav-user-role { font-size: 0.7rem; color: var(--gold); font-weight: 600; letter-spacing: 0.5px; }
.btn-vue-client {
  background: none;
  border: 1.5px solid var(--gold);
  color: var(--gold);
  padding: 7px 18px; border-radius: 8px;
  font-family: 'Outfit', sans-serif;
  font-size: 0.82rem; cursor: pointer; font-weight: 500;
  transition: all 0.2s; display: flex; align-items: center; gap: 6px;
  text-decoration: none;
}
.btn-vue-client:hover { background: var(--gold); color: white; }

/* ===== LAYOUT ===== */
.layout { display: flex; min-height: calc(100vh - 68px); }

/* ===== SIDEBAR ===== */
.sidebar {
  width: 245px;
  background: var(--white);
  border-right: 1px solid var(--border);
  padding: 28px 14px;
  position: sticky; top: 68px; height: calc(100vh - 68px);
  overflow-y: auto;
}
.sidebar::after {
  content: '';
  display: block;
  height: 6px;
  background: linear-gradient(90deg, var(--gold) 0%, var(--bordeaux) 100%);
  margin-top: 32px;
  border-radius: 3px;
}
.sidebar-section { margin-bottom: 28px; }
.sidebar-label {
  font-size: 0.62rem; font-weight: 700;
  letter-spacing: 2.5px; text-transform: uppercase;
  color: var(--gold); padding: 0 12px; margin-bottom: 8px; opacity: 0.8;
}
.nav-link {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 14px; border-radius: 10px;
  color: var(--text-soft); font-size: 0.88rem;
  cursor: pointer; transition: all 0.2s;
  text-decoration: none; margin-bottom: 2px; font-weight: 400;
}
.nav-link i { font-size: 1rem; width: 18px; }
.nav-link:hover { background: var(--gold-pale); color: var(--gold); }
.nav-link.active {
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
  color: white; font-weight: 500;
  box-shadow: 0 2px 10px rgba(139,105,20,0.25);
}
.nav-link.active i { color: white; }

/* ===== MAIN ===== */
.main { flex: 1; padding: 36px 40px; }

/* ===== ALERTS FLASH ===== */
.alert-success {
  background: #d1fae5; border: 1px solid #6ee7b7;
  color: #065f46; border-radius: 10px;
  padding: 12px 18px; margin-bottom: 24px;
  display: flex; align-items: center; gap: 10px;
  font-size: 0.88rem; font-weight: 500;
}
.alert-error {
  background: #fee2e2; border: 1px solid #fca5a5;
  color: #991b1b; border-radius: 10px;
  padding: 12px 18px; margin-bottom: 24px;
  display: flex; align-items: center; gap: 10px;
  font-size: 0.88rem; font-weight: 500;
}

/* ===== PAGE HEADER ===== */
.page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
.page-title { font-family: 'Cormorant Garamond', serif; font-size: 2.1rem; font-weight: 700; color: var(--text); }
.page-title span { color: var(--gold); font-style: italic; }

/* ===== BOUTONS ===== */
.btn-add {
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
  color: white; border: none;
  padding: 11px 24px; border-radius: 10px;
  font-family: 'Outfit', sans-serif;
  font-weight: 500; font-size: 0.88rem;
  cursor: pointer; display: flex; align-items: center; gap: 8px;
  transition: all 0.2s;
  box-shadow: 0 3px 12px rgba(139,105,20,0.30);
  text-decoration: none;
}
.btn-add:hover { box-shadow: 0 5px 18px rgba(139,105,20,0.45); transform: translateY(-1px); filter: brightness(1.05); color: white; }
.btn-back {
  background: none;
  border: 1.5px solid var(--border);
  color: var(--text-soft);
  padding: 8px 18px; border-radius: 8px;
  font-family: 'Outfit', sans-serif;
  font-size: 0.85rem; font-weight: 500;
  cursor: pointer; display: inline-flex; align-items: center; gap: 6px;
  transition: all 0.2s; text-decoration: none;
}
.btn-back:hover { border-color: var(--gold); color: var(--gold); }
.btn-submit {
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
  color: white; border: none;
  padding: 13px 30px; border-radius: 10px;
  font-family: 'Outfit', sans-serif;
  font-weight: 600; font-size: 0.92rem;
  cursor: pointer; display: flex; align-items: center; gap: 8px;
  transition: all 0.2s;
  box-shadow: 0 4px 16px rgba(139,105,20,0.30);
}
.btn-submit:hover { filter: brightness(1.05); transform: translateY(-1px); box-shadow: 0 6px 22px rgba(139,105,20,0.40); }

/* ===== TABLES ===== */
.table-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  box-shadow: var(--shadow);
}
.table-head {
  display: grid;
  padding: 14px 20px;
  background: linear-gradient(90deg, var(--gold-pale) 0%, #fdf6e8 100%);
  border-bottom: 2px solid var(--gold-light);
  font-size: 0.69rem; font-weight: 700;
  letter-spacing: 1.8px; text-transform: uppercase;
  color: var(--gold);
}
.head-cat  { grid-template-columns: 50px 1fr 2fr 110px 130px; }
.head-plat { grid-template-columns: 80px 1fr 140px 110px 1.5fr 130px; }
.table-row {
  display: grid;
  padding: 16px 20px;
  border-bottom: 1px solid #f0e8d5;
  align-items: center;
  transition: background 0.15s;
}
.table-row:last-child { border-bottom: none; }
.table-row:hover { background: #fdf8f0; }
.row-cat  { grid-template-columns: 50px 1fr 2fr 110px 130px; }
.row-plat { grid-template-columns: 80px 1fr 140px 110px 1.5fr 130px; }
.id-num   { color: var(--gold-light); font-size: 0.82rem; font-weight: 600; }
.nom      { font-weight: 600; color: var(--text); font-size: 0.92rem; }
.desc     { color: var(--text-soft); font-size: 0.82rem; line-height: 1.4; }
.badge-cat {
  display: inline-flex; align-items: center; gap: 5px;
  background: var(--gold-pale); color: var(--gold);
  border: 1px solid var(--gold-light);
  padding: 4px 12px; border-radius: 20px;
  font-size: 0.73rem; font-weight: 600;
}
.badge-count {
  background: #dbeafe; color: #1d4ed8;
  padding: 4px 12px; border-radius: 20px;
  font-size: 0.73rem; font-weight: 600;
}
.prix { color: var(--gold); font-weight: 700; font-size: 0.95rem; }
.food-img {
  width: 64px; height: 58px; border-radius: 10px;
  object-fit: cover;
  box-shadow: 0 2px 8px rgba(0,0,0,0.12);
  transition: transform 0.2s;
  border: 2px solid var(--gold-pale);
}
.food-img:hover { transform: scale(1.08); }
.img-placeholder {
  width: 64px; height: 58px; border-radius: 10px;
  background: var(--gold-pale); border: 1px dashed var(--gold-light);
  display: flex; align-items: center; justify-content: center;
  color: var(--gold); font-size: 1.3rem;
}
.action-btns { display: flex; gap: 6px; }
.btn-edit {
  background: var(--gold-pale); color: var(--gold);
  border: 1px solid var(--gold-light);
  padding: 7px 10px; border-radius: 8px;
  cursor: pointer; font-size: 0.8rem; transition: all 0.15s;
  text-decoration: none; display: inline-flex; align-items: center;
}
.btn-edit:hover { background: var(--gold); color: white; }
.btn-del {
  background: #fde8e8; color: var(--red);
  border: 1px solid #f5b8b8;
  padding: 7px 10px; border-radius: 8px;
  cursor: pointer; font-size: 0.8rem; transition: all 0.15s;
}
.btn-del:hover { background: var(--red); color: white; }

/* ===== STATS ===== */
.stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px; margin-bottom: 36px; }
.stat-card {
  background: var(--white); border: 1px solid var(--border);
  border-radius: 14px; padding: 20px 22px;
  box-shadow: var(--shadow); transition: all 0.25s;
  position: relative; overflow: hidden;
}
.stat-card::after {
  content: '';
  position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%);
  border-radius: 0 0 14px 14px;
}
.stat-card:hover { box-shadow: var(--shadow-hover); transform: translateY(-2px); }
.stat-icon {
  width: 44px; height: 44px; border-radius: 11px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; margin-bottom: 12px;
}
.stat-icon.gold  { background: var(--gold-pale); color: var(--gold); }
.stat-icon.bord  { background: #f5e0e0; color: var(--bordeaux); }
.stat-icon.blue  { background: #dbeafe; color: #1d4ed8; }
.stat-icon.green { background: #d8f3dc; color: var(--green); }
.stat-num   { font-family: 'Cormorant Garamond', serif; font-size: 2.4rem; font-weight: 700; color: var(--text); line-height: 1; }
.stat-label { font-size: 0.78rem; color: var(--text-soft); margin-top: 4px; }

/* ===== FORMS ===== */
.form-wrap { max-width: 650px; }
.form-card {
  background: var(--white); border: 1px solid var(--border);
  border-radius: 16px; padding: 32px;
  box-shadow: var(--shadow);
  position: relative; overflow: hidden;
}
.form-card::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 4px;
  background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 50%, var(--bordeaux) 100%);
}
.form-group { margin-bottom: 22px; }
.form-label {
  display: block; font-size: 0.74rem; font-weight: 700;
  letter-spacing: 1.2px; text-transform: uppercase;
  color: var(--gold); margin-bottom: 8px;
}
.required { color: var(--red); }
.form-input {
  width: 100%; background: var(--cream);
  border: 1.5px solid var(--border); color: var(--text);
  border-radius: 10px; padding: 11px 16px;
  font-size: 0.9rem; font-family: 'Outfit', sans-serif;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.form-input:focus {
  outline: none; border-color: var(--gold);
  box-shadow: 0 0 0 3px rgba(139,105,20,0.10); background: white;
}
.form-input.is-invalid { border-color: var(--red); }
.invalid-msg { color: var(--red); font-size: 0.78rem; margin-top: 5px; display: block; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.form-hint { font-size: 0.76rem; color: var(--text-soft); margin-top: 5px; }
.upload-zone {
  border: 2px dashed var(--gold-light);
  border-radius: 12px; padding: 28px;
  text-align: center; cursor: pointer;
  background: var(--gold-pale); transition: all 0.2s;
}
.upload-zone:hover { border-color: var(--gold); background: #f5e8c8; }
.upload-icon { font-size: 2.2rem; color: var(--gold); margin-bottom: 8px; display: block; }
.upload-text { color: var(--text-soft); font-size: 0.82rem; }
.upload-text strong { color: var(--gold); }
.img-preview-current { margin-bottom: 10px; }
.img-preview-current img {
  max-height: 110px; border-radius: 10px;
  border: 2px solid var(--gold-pale);
  box-shadow: var(--shadow);
}
.img-preview-current p { font-size: 0.76rem; color: var(--text-soft); margin-bottom: 6px; }
</style>
</head>
<body>

{{-- ===== TOPNAV ===== --}}
<nav class="topnav">
  <a href="{{ route('admin.categories.index') }}" class="brand">
    <div class="brand-icon"><i class="bi bi-cup-hot-fill"></i></div>
    <div>
      Saveurs du Sénégal
      <span class="brand-sub">Cuisine Authentique — Admin</span>
    </div>
  </a>
  <div style="display:flex;align-items:center;gap:20px;">
    <a href="{{ route('admin.menu') }}" class="btn-vue-client">
      <i class="bi bi-eye"></i> Vue client
    </a>
    <div class="nav-user">
      <div class="avatar">YJ</div>
      <div>
        <div class="nav-user-name">Yayra Joanella</div>
        <div class="nav-user-role">Groupe B</div>
      </div>
    </div>
  </div>
</nav>

<div class="layout">

  {{-- ===== SIDEBAR ===== --}}
  <aside class="sidebar">
    <div class="sidebar-section">
      <div class="sidebar-label">Gestion</div>
      <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
         href="{{ route('admin.categories.index') }}">
        <i class="bi bi-tag-fill"></i> Catégories
      </a>
      <a class="nav-link {{ request()->routeIs('admin.plats.*') ? 'active' : '' }}"
         href="{{ route('admin.plats.index') }}">
        <i class="bi bi-egg-fried"></i> Plats
      </a>
      <a class="nav-link {{ request()->routeIs('admin.menu') ? 'active' : '' }}"
         href="{{ route('admin.menu') }}">
        <i class="bi bi-layout-text-window"></i> Menu client
      </a>
    </div>
    <div class="sidebar-section">
      <div class="sidebar-label">Ajouter</div>
      <a class="nav-link {{ request()->routeIs('admin.categories.create') ? 'active' : '' }}"
         href="{{ route('admin.categories.create') }}">
        <i class="bi bi-plus-circle-fill"></i> Nouvelle catégorie
      </a>
      <a class="nav-link {{ request()->routeIs('admin.plats.create') ? 'active' : '' }}"
         href="{{ route('admin.plats.create') }}">
        <i class="bi bi-plus-circle-fill"></i> Nouveau plat
      </a>
    </div>
  </aside>

  {{-- ===== CONTENU PRINCIPAL ===== --}}
  <main class="main">

    {{-- Messages flash --}}
    @if(session('success'))
      <div class="alert-success">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="alert-error">
        <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
      </div>
    @endif

    @yield('content')
  </main>
</div>

<script>
// Prévisualisation image avant upload
function previewImage(input, previewId) {
  const file = input.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = e => {
    const el = document.getElementById(previewId);
    if (el) { el.src = e.target.result; el.parentElement.style.display = 'block'; }
  };
  reader.readAsDataURL(file);
}
</script>
</body>
</html>
