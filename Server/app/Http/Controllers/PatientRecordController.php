<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientRecordResource;
use App\Models\PatientRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $patients = PatientRecord::where('patient_id', $id)->latest()->get();

        return PatientRecordResource::collection($patients);
    }

    public function now_patient()
    {
        $patients = PatientRecord::whereDate('created_at', Carbon::now())->count();

        return response()->json($patients);

    }

    public function now_hospital_patient()
    {
        $user = Auth::user();
        $patients = PatientRecord::where('created_at', Carbon::now())->where('hospital', $user->hospital);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create basic patient record
        $record = PatientRecord::create([
            'patient_id' => $request->patient_id,
            'nurse_notes' => $request->nurse_notes,
            //            'hospital' => $request->hospital
        ]);

        return new PatientRecordResource($record);
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
    public function edit(PatientRecord $patientRecord)
    {
        return new PatientRecordResource($patientRecord);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientRecord $patientRecord)
    {
        $patientRecord->update($request->all());

        return new PatientRecordResource($patientRecord);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
