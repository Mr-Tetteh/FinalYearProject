<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceManagement extends Controller
{

    public function index($id)
    {

        $serviceManagement = \App\Models\ServiceManagement::where('hospital_id', $id)->get();
        return  \App\Http\Resources\ServiceManagement::collection($serviceManagement);
    }

    public function consultation($id)
    {
        $serviceManagement = \App\Models\ServiceManagement::where('hospital_id', $id)->where('name', 'Consultation')->get();
        return  \App\Http\Resources\ServiceManagement::collection($serviceManagement);
    }


    public function create(Request $request)
    {
        $serviceManagement = \App\Models\ServiceManagement::create([
            'hospital_id' => $request->input('hospital_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        return new \App\Http\Resources\ServiceManagement($serviceManagement);
    }


    public function show($id)
    {
        $serviceManagement = \App\Models\ServiceManagement::findOrFail($id);
        return new \App\Http\Resources\ServiceManagement($serviceManagement);

    }

    public function update(Request $request, $id)
    {
        $serviceManagement = \App\Models\ServiceManagement::findOrFail($id);
        $serviceManagement->update($request->all());
    }

    public function delete($id)
    {
        \App\Models\ServiceManagement::find($id)->delete();
        return response()->json([
            'message' => 'Service Management deleted successfully',
        ]);

    }
}
