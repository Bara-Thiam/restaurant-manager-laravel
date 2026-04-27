<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plat extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom', 'description', 'prix', 'image', 'categorie_id'];

    /**
     * Un plat appartient à une catégorie (belongsTo)
     * Ex: Thiéboudienne → catégorie "Plats de résistance"
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Un plat peut apparaître dans plusieurs commandes (many-to-many)
     * La table pivot commande_plat contient aussi la quantite
     */
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_plat')
                    ->withPivot('quantite');
    }
}
