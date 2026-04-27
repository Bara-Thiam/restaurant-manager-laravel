<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;

    // Les champs qu'on peut remplir en masse (mass assignment)
    protected $fillable = ['nom', 'description'];

    /**
     * Une catégorie a plusieurs plats (hasMany)
     * Ex: Catégorie "Plats" → Thiéboudienne, Yassa, Mafé...
     */
    public function plats()
    {
        return $this->hasMany(Plat::class);
    }
}
