<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'table_id', 'statut'];

    // Une commande appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Une commande appartient à une table
    public function table()
    {
        return $this->belongsTo(\App\Models\TableRestaurant::class, 'table_id');
    }

    // Une commande a plusieurs plats (many-to-many avec pivot quantite)
    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'commande_plat')
                    ->withPivot('quantite');
    }
}