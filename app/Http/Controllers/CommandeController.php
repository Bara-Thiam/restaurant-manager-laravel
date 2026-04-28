<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Plat;
use App\Models\TableRestaurant;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // Liste des commandes
    public function index()
    {
        $commandes = Commande::with('user', 'table', 'plats')->latest()->get();
        return view('commandes.index', compact('commandes'));
    }

    // Formulaire de création
    public function create()
    {
        $plats = Plat::all();
        $tables = TableRestaurant::all();
        return view('commandes.create', compact('plats', 'tables'));
    }

    // Enregistrer la commande
    public function store(Request $request)
    {
        $request->validate([
            'table_id'       => 'required|exists:tables,id',
            'plats'          => 'required|array',
            'plats.*.id'     => 'required|exists:plats,id',
            'plats.*.quantite' => 'required|integer|min:1',
        ]);

        // Créer la commande
        $commande = Commande::create([
            'user_id'  => auth()->id(),
            'table_id' => $request->table_id,
            'statut'   => 'en_attente',
        ]);

        // Attacher les plats avec leur quantité dans le pivot
        $platsPivot = [];
        foreach ($request->plats as $plat) {
            $platsPivot[$plat['id']] = ['quantite' => $plat['quantite']];
        }
        $commande->plats()->attach($platsPivot);

        return redirect()->route('commandes.show', $commande)
                         ->with('success', 'Commande créée avec succès !');
    }

    // Détail d'une commande
    public function show(Commande $commande)
    {
        $commande->load('plats', 'table', 'user');
        return view('commandes.show', compact('commande'));
    }

    // Ticket de caisse
    public function ticket(Commande $commande)
    {
        $commande->load('plats', 'table', 'user');
        return view('commandes.ticket', compact('commande'));
    }
}