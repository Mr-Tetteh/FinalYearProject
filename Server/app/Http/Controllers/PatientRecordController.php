<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientRecordResource;
use App\Models\PatientRecord;
use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $patient = PatientRecord::where('patient_id', $id)->first();

        if (!$patient) {
            return response()->json([
                'message' => 'Patient record not found'
            ], 404);
        }

        return new PatientRecordResource($patient);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create basic patient record
        $record = PatientRecord::create([
            'patient_id' => $request->patient_id,
            'history' => $request->history,
            'examination_findings' => $request->examination_findings,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'respiratory_rate' => $request->respiratory_rate,
            'blood_pressure' => $request->blood_pressure,
            'blood_and_sugar_rate' => $request->blood_and_sugar_rate,
            'temperature' => $request->temperature,
            'pulse_rate' => $request->pulse_rate,
            'weight' => $request->weight,
            'admitted' => $request->admitted,
            'labs' => $request->labs,
            'ward_number' => $request->ward_number,
            'additional_notes' => $request->additional_notes,
        ]);

        for ($i = 1; $i <= 10; $i++) {
            $labName = "lab{$i}";
            $labResults = "lab{$i}_results";

            if ($request->has($labName)) {
                $record->{$labName} = $request->input($labName);
            }

            if ($request->hasFile($labResults)) {
                $paths = collect($request->file($labResults))->map(function ($file) use ($record, $i) {
                    return $file->store("patient_records/{$record->id}/lab{$i}", 'public');
                })->toArray();

                $record->{$labResults} = json_encode($paths);
            }
        }

        $record->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Patient record created successfully',
            'data' => $record
        ], 201);
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
