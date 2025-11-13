<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Produit;


use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return response()->json($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $produit = Produit::create([
            'name' => $request->name,
            'reference' => $request->reference,
            'image' => $request->image,
            'stock_quantity' => $request->stock_quantity,
            'description' => $request->description,
            'marque_id' => $request->marque_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);
      
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::find($id);
        return response()->json($produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     
        $produit = Produit::find($id);
        $produit->delete();
        return response()->json(['message' => 'Produit deleted successfully']);
    }
}
