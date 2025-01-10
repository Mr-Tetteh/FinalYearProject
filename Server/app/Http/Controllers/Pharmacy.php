<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function updateQuantities(Request $request)
    {
        DB::beginTransaction();

        try {
            foreach ($request->items as $item) {
                $drug = \App\Models\Pharmacy::findOrFail($item['id']);

                if ($drug->quantity < $item['quantity']) {
                    throw new \Exception("Insufficient quantity for drug: {$drug->name}");
                }

                $drug->decrement('quantity', $item['quantity']);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Quantities updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
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
