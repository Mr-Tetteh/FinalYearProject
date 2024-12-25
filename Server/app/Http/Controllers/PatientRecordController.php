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

        $patient_record = PatientRecord::create([
            'patient_id' => $request->input('patient_id'),
            'user_id' => $request->input('user_id'),
            'history' => $request->input('history'),
            'diagnosis' => $request->input('diagnosis'),
            'examination_findings' => $request->input('examination_findings'),
            'treatment' => $request->input('treatment'),
            'temperature' => $request->input('temperature'),
            'respiratory_rate' => $request->input('respiratory_rate'),
            'admitted' => $request->input('admitted'),
            'ward_number' => $request->input('ward_number'),
            'pulse_rate' => $request->input('pulse_rate'),
            'sugar_rate' => $request->input('sugar_rate'),
            'additional_note' => $request->input('additional_note'),
            'blood_and_sugar_rate' => $request->input('blood_and_sugar_rate'),
            'blood_pressure' => $request->input('blood_pressure'),
            'weight' => $request->input('weight'),
            'labs' => $request->input('labs'),
            'lab1' => $request->input('lab1'),
            'lab1_results' => $request->input('lab1_results'),
            'lab2' => $request->input('lab2'),
            'lab2_results' => $request->input('lab2_results'),
            'lab3' => $request->input('lab3'),
            'lab3_results' => $request->input('lab3_results'),
            'lab4' => $request->input('lab4'),
            'lab4_results' => $request->input('lab4_results'),
            'lab5' => $request->input('lab5'),
            'lab5_results' => $request->input('lab5_results'),
            'lab6' => $request->input('lab6'),
            'lab6_results' => $request->input('lab6_results'),
            'lab7' => $request->input('lab7'),
            'lab7_results' => $request->input('lab7_results'),
            'lab8' => $request->input('lab8'),
            'lab8_results' => $request->input('lab8_results'),
            'lab9' => $request->input('lab9'),
            'lab9_results' => $request->input('lab9_results'),
            'lab10' => $request->input('lab10'),
            'lab10_results' => $request->input('lab10_results'),
        ]);

        return new PatientRecordResource($patient_record);
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
