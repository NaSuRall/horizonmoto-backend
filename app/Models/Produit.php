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
        'category_id'
    ];
}
