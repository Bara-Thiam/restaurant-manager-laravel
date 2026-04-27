<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Affiche la liste de toutes les catégories
     * Route: GET /admin/categories
     */
    public function index()
    {
        $categories = Categorie::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création
     * Route: GET /admin/categories/create
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie en base
     * Route: POST /admin/categories
     */
    public function store(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->only('nom', 'description'));

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Catégorie créée avec succès !');
    }

    /**
     * Affiche le formulaire d'édition
     * Route: GET /admin/categories/{categorie}/edit
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Met à jour une catégorie existante
     * Route: PUT /admin/categories/{categorie}
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie->update($request->only('nom', 'description'));

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Catégorie mise à jour !');
    }

    /**
     * Supprime (soft delete) une catégorie
     * La ligne reste en base avec deleted_at rempli
     * Route: DELETE /admin/categories/{categorie}
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete(); // soft delete, pas de suppression réelle

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Catégorie supprimée.');
    }
}
