<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHosptialRequest;
use App\Http\Resources\HospitalResource;
use App\Jobs\InitPaymentJB;
use App\Models\Hospital;
use App\Models\Payment;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Hospital",
 *     description="Operations related to hospitals"
 * )
 */
class HosptialController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/hospitals",
     *     summary="Get list of hospitals",
     *     description="Returns a list of all hospitals",
     *     tags={"Hospital"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="List of hospitals",
     *
     *         @OA\JsonContent(
     *             type="array",
     *
     *             @OA\Items(ref="#/components/schemas/Hospital")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return HospitalResource::collection($hospitals);
    }

    /**
     * @OA\Post(
     *     path="/api/hospitals",
     *     summary="Create a new hospital",
     *     description="Stores a newly created hospital",
     *     tags={"Hospital"},
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"hospital_name", "hospital_address", "hospital_contact", "hospital_email", "hospital_country", "hospital_city", "user_name", "user_phone_number", "user_email"},
     *
     *             @OA\Property(property="hospital_name", type="string", description="The name of the hospital"),
     *             @OA\Property(property="hospital_address", type="string", description="The address of the hospital"),
     *             @OA\Property(property="hospital_contact", type="string", description="The contact number of the hospital"),
     *             @OA\Property(property="hospital_email", type="string", description="The email address of the hospital"),
     *             @OA\Property(property="hospital_location", type="string", description="The location of the hospital"),
     *             @OA\Property(property="hospital_country", type="string", description="The country of the hospital"),
     *             @OA\Property(property="hospital_city", type="string", description="The city of the hospital"),
     *             @OA\Property(property="user_name", type="string", description="The name of the contact person at the hospital"),
     *             @OA\Property(property="user_phone_number", type="string", description="The phone number of the contact person"),
     *             @OA\Property(property="user_email", type="string", description="The email address of the contact person"),
     *             @OA\Property(property="number_of_monthly_subscription", type="integer", description="The number of monthly subscriptions for the hospital")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Hospital created successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/Hospital")
     *     ),
     *
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $hospital = Hospital::create([
            'hospital_name' => $request->input('hospital_name'),
            'hospital_address' => $request->input('hospital_address'),
            'hospital_contact' => $request->input('hospital_contact'),
            'hospital_email' => $request->input('hospital_email'),
            'hospital_location' => $request->input('hospital_location'),
            'hospital_consistency' => $request->input('hospital_country'),
            'hospital_city' => $request->input('hospital_city'),
            'status' => $request->input('status'),
            'number_of_monthly_subscription' => $request->input('number_of_monthly_subscription'),
        ]);

        InitPaymentJB::dispatch($hospital);

        return response()->json([
            'message' => 'Hospital created successfully',
            'hospital' => $hospital,
        ], 201);
    }

    public function hospital_count()
    {
        $count_hospital = Hospital::get()->count();

        return response()->json($count_hospital);

    }
    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        $hospitals = $hospital->all();

        return HospitalResource::collection($hospitals);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hosptial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHosptialRequest $request, Hospital $hosptial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        if ($hospital->delete()) {
            return response()->json(['message' => 'Hospital deleted successfully']);
        } else {
            return response()->json(['message' => 'Hospital not deleted'], 500);
        }

    }
}
