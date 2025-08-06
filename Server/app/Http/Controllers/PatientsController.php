<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patents = Patients::latest()->get();

        return PatientResource::collection($patents);

    }

    public function hospitals_patients($id)
    {
        $patient = Patients::whereHas('hospital', function ($query) use ($id){
            $query->where('hospitals.id', $id);
        })->latest()->get();

        return PatientResource::collection($patient);

    }

    public function hospitals_patients_count()
    {
        $user = Auth::user();
        $patient_count = Patients::where('hospital', $user->hospital_id)->count();

        return response()->json($patient_count);

    }

    public function count_all_patient()
    {
        $patients = Patients::all()->count();

        return response()->json($patients);

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
    public function store(StorePatientsRequest $request)
    {
        $request->validated();
        $patient = Patients::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'other_name' => $request->input('other_name'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'contact' => $request->input('contact'),
            'residential_address' => $request->input('residential_address'),
            'email' => $request->input('email'),
            'medical_history' => $request->input('medical_history'),
            'allergies' => $request->input('allergies'),
            'additional_notes' => $request->input('additional_notes'),
            'guardian1_first_name' => $request->input('guardian1_first_name'),
            'guardian1_last_name' => $request->input('guardian1_last_name'),
            'guardian1_other_names' => $request->input('guardian1_other_names'),
            'guardian1_relation' => $request->input('guardian1_relation'),
            'guardian1_residential_address' => $request->input('guardian1_residential_address'),
            'guardian1_contact' => $request->input('guardian1_contact'),
            'guardian2_first_name' => $request->input('guardian2_first_name'),
            'guardian2_last_name' => $request->input('guardian2_last_name'),
            'guardian2_other_names' => $request->input('guardian2_other_names'),
            'guardian2_relation' => $request->input('guardian2_relation'),
            'guardian2_residential_address' => $request->input('guardian2_residential_address'),
            'guardian2_contact' => $request->input('guardian2_contact'),
            'hospital'=> $request->input('hospital'),
        ]);

        return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patients)
    {
        return new PatientResource($patients);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patients $patients)
    {
        $patients->update([
            'status' => $request->input('status'),
            'activated_at' => now(),
        ]);

        return new PatientResource($patients);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
