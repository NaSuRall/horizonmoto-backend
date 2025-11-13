<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        // Charger les catégories associées à chaque produit
        $produits = Produit::with('categories')->get();
        return response()->json($produits);
    }

    public function store(Request $request)
    {
        // Validation basique
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'image' => 'nullable|string',
            'stock_quantity' => 'required|integer',
            'description' => 'nullable|string',
            'marque_id' => 'required|integer|exists:marques,id',
            'price' => 'required|numeric',
            'categories' => 'array',
            'categories.*' => 'integer|exists:categories,id'
        ]);

        // Séparer les catégories du reste
        $categories = $validated['categories'] ?? [];
        unset($validated['categories']);

        // Créer le produit
        $produit = Produit::create($validated);

        // Attacher les catégories (si présentes)
        if (!empty($categories)) {
            $produit->categories()->attach($categories);
        }

        // Charger les catégories liées
        $produit->load('categories');

        return response()->json([
            'message' => 'Produit créé avec succès',
            'produit' => $produit
        ], 201);
    }

    public function show(string $id)
    {
        $produit = Produit::with('categories')->findOrFail($id);
        return response()->json($produit);
    }

    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return response()->json(['message' => 'Produit supprimé avec succès']);
    }
}
