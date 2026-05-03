<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut'  => 'required|date',
            'date_fin'    => 'required|date|after_or_equal:date_debut',
            'actif'       => 'boolean',
        ]);

        Menu::create([
            'nom'         => $request->nom,
            'description' => $request->description,
            'date_debut'  => $request->date_debut,
            'date_fin'    => $request->date_fin,
            'actif'       => $request->has('actif'),
        ]);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu créé avec succès.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut'  => 'required|date',
            'date_fin'    => 'required|date|after_or_equal:date_debut',
        ]);

        $menu->update([
            'nom'         => $request->nom,
            'description' => $request->description,
            'date_debut'  => $request->date_debut,
            'date_fin'    => $request->date_fin,
            'actif'       => $request->has('actif'),
        ]);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu modifié avec succès.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu supprimé.');
    }

    public function archives()
    {
        $menus = Menu::onlyTrashed()->get();
        return view('admin.menus.archives', compact('menus'));
    }

    public function restore($id)
    {
        Menu::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.menus.archives')
                         ->with('success', 'Menu restauré.');
    }

    public function clientView()
    {
        $categories = \App\Models\Categorie::with('plats')->get();
        return view('admin.menus.client', compact('categories'));
    }
}