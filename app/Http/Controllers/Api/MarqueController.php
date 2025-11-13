<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Marque;

use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return response()->json($marques);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marque = Marque::create([
            'name' => $request->name,
        ]);
        return response()->json($marque);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marque = Marque::find($id);
        return response()->json($marque);
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
        $marque = Marque::find($id);
        $marque->delete();
        return response()->json(['message' => 'Marque deleted successfully']);
    }
}
