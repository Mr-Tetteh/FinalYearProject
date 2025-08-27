<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreLabsRequest;
use App\Http\Resources\LabsResource;
use App\Models\Lab;
use Illuminate\Support\Facades\Storage;

class LabsController extends Controller
{
    public function create(StoreLabsRequest $request, $id, $patient)
    {
        $path = null;
        if ($request->hasFile('lab_report')) {
            $path = $request->file('lab_report')->store('labs', 'public');

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

    public function get_labs($patient, $record_id)
    {
        $record = Lab::where('patient_id', $patient)->where('patient_record_id', $record_id)->get();

        return LabsResource::collection($record);

    }


    public function showLabReport($filename)
    {
        return Storage::disk('public')->response("labs/$filename");
    }
}
