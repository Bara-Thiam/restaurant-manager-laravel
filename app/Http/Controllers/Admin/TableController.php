<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableRestaurant;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = TableRestaurant::all();
        return view('admin.tables.index', compact('tables'));
    }

    public function create()
    {
        return view('admin.tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero'   => 'required|integer|unique:table_restaurants',
            'capacite' => 'required|integer|min:1',
            'statut'   => 'required|in:libre,occupee',
        ]);

        TableRestaurant::create($request->all());
        return redirect()->route('admin.tables.index')
                         ->with('success', 'Table créée avec succès.');
    }

    public function edit(TableRestaurant $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    public function update(Request $request, TableRestaurant $table)
    {
        $request->validate([
            'numero'   => 'required|integer|unique:table_restaurants,numero,' . $table->id,
            'capacite' => 'required|integer|min:1',
            'statut'   => 'required|in:libre,occupee',
        ]);

        $table->update($request->all());
        return redirect()->route('admin.tables.index')
                         ->with('success', 'Table modifiée avec succès.');
    }

    public function destroy(TableRestaurant $table)
    {
        $table->delete(); // soft delete
        return redirect()->route('admin.tables.index')
                         ->with('success', 'Table supprimée.');
    }

    public function archives()
    {
        $tables = TableRestaurant::onlyTrashed()->get();
        return view('admin.tables.archives', compact('tables'));
    }

    public function restore($id)
    {
        TableRestaurant::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.tables.archives')
                         ->with('success', 'Table restaurée.');
    }
}