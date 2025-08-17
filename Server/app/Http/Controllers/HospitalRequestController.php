<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHospitalRequest;
use App\Http\Resources\HospitalRequestResource;
use App\Models\HospitalRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalRequestController extends Controller
{
    public function index()
    {
        return HospitalRequestResource::collection(HospitalRequest::all());
    }

    public function show(HospitalRequest $hospitalRequest)
    {
        return new HospitalRequestResource($hospitalRequest);
    }


    public function store(StoreHospitalRequest $request)
    {
        if (auth()->user()->email !== $request->input('email')) {
            return response()->json(['message' => 'Please enter your email'], 422);
        }elseif (auth()->user()->unique_id !== $request->input('unique_id')) {
            return response()->json(['message' => 'Please enter your unique id'], 422);
        }elseif (auth()->user()->contact !== $request->input('contact')) {
            return response()->json(['message' => 'Please enter your contact'], 422);
        }
        $request->validated();
        $userRequest = HospitalRequest::create([
            'email' => $request->input('email'),
            'unique_id' => $request->input('unique_id'),
            'contact' => '+233' . substr($request->input('contact'), -9),
            'hospital' => $request->input('hospital'),
        ]);
        sendWithSMSONLINEGH('233' . substr($request->input('contact'), -9), 'Your request to join ' . $request->input('hospital') . ' has been received and currently pending. We will review your request and get back to you soon. Thank you!.');
        return new HospitalRequestResource($userRequest);
    }
}
