<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Plat;
use App\Models\TableRestaurant;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('user', 'table', 'plats')->latest()->get();
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $plats = Plat::all();
        $tables = TableRestaurant::all();
        return view('commandes.create', compact('plats', 'tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id'               => 'required|exists:table_restaurants,id',
            'plats'                  => 'required|array',
            'plats.*.id'             => 'required|exists:plats,id',
            'plats.*.quantite'       => 'required|integer|min:1',
        ]);

        $commande = Commande::create([
            'user_id'  => auth()->id(),
            'table_id' => $request->table_id,
            'statut'   => 'en_attente',
        ]);

        $platsPivot = [];
        foreach ($request->plats as $plat) {
            if ($plat['quantite'] > 0) {
                $platsPivot[$plat['id']] = ['quantite' => $plat['quantite']];
            }
        }
        $commande->plats()->attach($platsPivot);

        return redirect()->route('commandes.show', $commande)
                         ->with('success', 'Commande créée avec succès !');
    }

    public function show(Commande $commande)
    {
        $commande->load('plats', 'table', 'user');
        return view('commandes.show', compact('commande'));
    }

    public function ticket(Commande $commande)
    {
        $commande->load('plats', 'table', 'user');
        return view('commandes.ticket', compact('commande'));
    }

    public function edit(Commande $commande) {}
    public function update(Request $request, Commande $commande) {}
    public function destroy(Commande $commande) {}
}