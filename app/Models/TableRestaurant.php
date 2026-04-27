<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableRestaurant extends Model
{
    use SoftDeletes;

    protected $fillable = ['numero', 'capacite', 'statut'];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'table_id');
    }
}