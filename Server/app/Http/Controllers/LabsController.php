<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreLabsRequest;
use App\Models\Lab;

class LabsController extends Controller
{
    public function create(StoreLabsRequest $request, $id, $patient)
    {
        $path = null;
        if ($request->hasFile('lab_report')) {
            $path = $request->file('lab_report')->store('public');
        }
        $labs = Lab::create(
            [
                'patient_id' => $patient,
                'patient_record_id' => $id,
                'lab_name' => $request->lab_name,
                'lab_report' => $path
            ]
        );
        return new \App\Http\Resources\LabsResource($labs);
    }
}
