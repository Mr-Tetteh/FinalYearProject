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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $patient_record =  PatientRecord::create([
            'patient_id' => $request->input('patient_id'),
            'symptoms' => $request->input('symptoms'),
            'diagnosis' => $request->input('diagnosis'),
            'treatment' => $request->input('treatment'),
            'temperature' => $request->input('temperature'),
            'pulse_rate' => $request->input('pulse_rate'),
            'sugar_rate' => $request->input('sugar_rate'),
            'admitted' => $request->input('admitted'),
            'surgery' => $request->input('surgery'),
            'surgery_date' => $request->input('surgery_date'),
            'surgery_reason' => $request->input('surgery_reason'),
            'additional_note' => $request->input('additional_note'),

        ]);
       return PatientRecordResource::collection($patient_record);
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
