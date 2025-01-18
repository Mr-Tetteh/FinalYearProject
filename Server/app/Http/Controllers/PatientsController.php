<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
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

    public function hospitals_patients()
    {
        $user = Auth::user();
        $patient = Patients::where('hospital', $user->hospital)->get();
        return PatientResource::collection($patient);

    }

    public function hospitals_patients_count()
    {
        $user = Auth::user();
        $patient_count = Patients::where('hospital', $user->hospital)->count();
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
    public function store(Request $request)
    {
        $patient = Patients::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'other_name' => $request->input('other_names'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'medical_history' => $request->input('medical_history'),
            'allergies' => $request->input('allergies'),
            'additional_notes' => $request->input('additional_notes'),
            'guardian1_first_name' => $request->input('guardian1_first_name'),
            'guardian1_last_name' => $request->input('guardian1_last_name'),
            'guardian1_other_names' => $request->input('guardian1_other_names'),
            'guardian1_relation' => $request->input('guardian1_relation'),
            'guardian1_residence' => $request->input('guardian1_residence'),
            'guardian1_contact' => $request->input('guardian1_contact'),
            'guardian2_first_name' => $request->input('guardian2_first_name'),
            'guardian2_last_name' => $request->input('guardian2_last_name'),
            'guardian2_other_names' => $request->input('guardian2_other_names'),
            'guardian2_relation' => $request->input('guardian2_relation'),
            'guardian2_residence' => $request->input('guardian2_residence'),
            'guardian2_contact' => $request->input('guardian2_contact'),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
