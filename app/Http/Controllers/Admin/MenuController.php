<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;

class MenuController extends Controller
{
    /**
     * Affiche le menu public avec toutes les catégories et leurs plats
     * Route: GET /admin/menu
     *
     * with('plats') = eager loading : charge les plats de chaque catégorie
     * en une seule requête SQL (évite le problème N+1)
     */
    public function index()
    {
        $categories = Categorie::with('plats')->get();
        return view('admin.menu', compact('categories'));
    }
}
