<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatController extends Controller
{
    /**
     * Affiche la liste de tous les plats avec leur catégorie
     * Route: GET /admin/plats
     */
    public function index()
    {
        // with('categorie') = eager loading : charge les catégories en 1 seule requête SQL
        $plats = Plat::with('categorie')->latest()->paginate(10);
        return view('admin.plats.index', compact('plats'));
    }

    /**
     * Affiche le formulaire de création d'un plat
     * Route: GET /admin/plats/create
     */
    public function create()
    {
        // On passe toutes les catégories pour le menu déroulant
        $categories = Categorie::all();
        return view('admin.plats.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau plat avec son image
     * Route: POST /admin/plats
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'          => 'required|string|max:255',
            'description'  => 'nullable|string',
            'prix'         => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('nom', 'description', 'prix', 'categorie_id');

        // Gestion de l'upload d'image
        // store('plats', 'public') = sauvegarde dans storage/app/public/plats/
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('plats', 'public');
        }

        Plat::create($data);

        return redirect()->route('admin.plats.index')
                         ->with('success', 'Plat ajouté avec succès !');
    }

    /**
     * Affiche le formulaire d'édition d'un plat
     * Route: GET /admin/plats/{plat}/edit
     */
    public function edit(Plat $plat)
    {
        $categories = Categorie::all();
        return view('admin.plats.edit', compact('plat', 'categories'));
    }

    /**
     * Met à jour un plat existant
     * Route: PUT /admin/plats/{plat}
     */
    public function update(Request $request, Plat $plat)
    {
        $request->validate([
            'nom'          => 'required|string|max:255',
            'description'  => 'nullable|string',
            'prix'         => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('nom', 'description', 'prix', 'categorie_id');

        // Si une nouvelle image est uploadée, on supprime l'ancienne et on sauvegarde la nouvelle
        if ($request->hasFile('image')) {
            if ($plat->image) {
                Storage::disk('public')->delete($plat->image); // supprime l'ancienne image
            }
            $data['image'] = $request->file('image')->store('plats', 'public');
        }

        $plat->update($data);

        return redirect()->route('admin.plats.index')
                         ->with('success', 'Plat mis à jour !');
    }

    /**
     * Supprime (soft delete) un plat
     * Route: DELETE /admin/plats/{plat}
     */
    public function destroy(Plat $plat)
    {
        $plat->delete(); // soft delete

        return redirect()->route('admin.plats.index')
                         ->with('success', 'Plat supprimé.');
    }
}
