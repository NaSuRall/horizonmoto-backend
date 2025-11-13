<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'categorie_produit');
    }
}

