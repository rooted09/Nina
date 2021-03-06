<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function produit()
    {
        return $this->belongsToMany(Produit::class, 'commande_produits', 'commande_id', 'produit_id');
    }
}
