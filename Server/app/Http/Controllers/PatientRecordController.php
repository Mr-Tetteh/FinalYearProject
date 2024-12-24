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

        $patient_record = PatientRecord::create([
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
            'lab11' => $request->input('lab11'),
            'lab11_results' => $request->input('lab11_results'),
            'lab12' => $request->input('lab12'),
            'lab12_results' => $request->input('lab12_results'),
            'lab13' => $request->input('lab13'),
            'lab13_results' => $request->input('lab13_results'),
            'lab14' => $request->input('lab14'),
            'lab14_results' => $request->input('lab14_results'),
            'lab15' => $request->input('lab15'),
            'lab15_results' => $request->input('lab15_results'),
            'labs_is_paid' => $request->input('labs_is_paid'),
            'drugs_is_paid' => $request->input('drugs_is_paid'),
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
