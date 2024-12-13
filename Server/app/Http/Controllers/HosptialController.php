<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHosptialRequest;
use App\Http\Requests\UpdateHosptialRequest;
use App\Http\Resources\HospitalResource;
use App\Models\Hosptial;

class HosptialController extends Controller
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
    public function store(StoreHosptialRequest $request)
    {
       $hospital = Hosptial::create([
            'hospital_name' => $request->input('hospital_name'),
            'hospital_address' => $request->input('hospital_address'),
            'hospital_contact' => $request->input('hospital_contact'),
            'hospital_email' => $request->input('hospital_email'),
            'hospital_country' => $request->input('hospital_country'),
            'hospital_city' => $request->input('hospital_city'),
            'user_name' => $request->input('user_name'),
            'user_phone_number' => $request->input('user_phone_number'),
            'user_email' => $request->input('user_email'),
            'number_of_monthly_subscription' => $request->input('number_of_monthly_subscription'),
        ]);
       return new HospitalResource($hospital);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hosptial $hosptial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hosptial $hosptial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHosptialRequest $request, Hosptial $hosptial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hosptial $hosptial)
    {
        //
    }
}
