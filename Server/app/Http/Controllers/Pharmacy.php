<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pharmacy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = \App\Models\Pharmacy::all()->groupBy('category');

        $result = $drugs->map(function ($items, $category) {
            return [
                'category' => $category,
                'drugs' => \App\Http\Resources\Pharmacy::collection($items),
            ];
        })->values();

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pharmacy =  \App\Models\Pharmacy::create([
           'name' => $request->input('name'),
           'price' => $request->input('price'),
           'quantity' => $request->input('quantity'),
           'category' => $request->input('category'),
           'use' => $request->input('use'),
           'additional_notes' => $request->input('additional_notes'),
        ]);

        return new \App\Http\Resources\Pharmacy($pharmacy);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
