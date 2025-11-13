<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $fillable = [
        'name',
        'description',
        'reference',
        'price',
        'image',
        'stock_quantity',
        'marque_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'categorie_produit');
    }
}
