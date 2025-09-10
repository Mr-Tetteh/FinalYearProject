<?php

namespace App\Http\Controllers;

use App\Http\Resources\LabManagementResource;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class LabManagement extends Controller
{
    public function create(Request $request)
    {
        $labManagement = \App\Models\LabManagement::create([
            'hospital_id' => $request->input('hospital_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        return new LabManagementResource($labManagement);
    }

    public function fetchLabManagement($id)
    {
        $lab = \App\Models\LabManagement::where('hospital_id', $id)->get();
        return LabManagementResource::collection($lab);
    }

    public function show($id)
    {
        $lab = \App\Models\LabManagement::findOrFail($id);
        return new LabManagementResource($lab);
    }

    public function update(Request $request, $id)
    {
        $labManagement = \App\Models\LabManagement::findOrFail($id);

        $labManagement->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return new LabManagementResource($labManagement);
    }


    public function delete($id)
    {
        $lab = \App\Models\LabManagement::find($id);
        $lab->delete();
        return new LabManagementResource($lab);
    }
}
