<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHospitalRequest;
use App\Http\Resources\HospitalRequestResource;
use App\Http\Resources\HospitalResource;
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


    public function store(StoreHospitalRequest $request)
    {
        if (auth()->user()->email !== $request->input('email')) {
            return response()->json(['message' => 'Please enter your email'], 422);
        } elseif (auth()->user()->unique_id !== $request->input('unique_id')) {
            return response()->json(['message' => 'Please enter your unique id'], 422);
        } elseif (auth()->user()->contact !== $request->input('contact')) {
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

    public function show(HospitalRequest $hospitalRequest)
    {
        return new HospitalRequestResource($hospitalRequest);
    }

    public function update($id, Request $request)
    {
        $hospital_request = HospitalRequest::findOrFail($id);
        $hospital_request->update([
            'status' => $request->input('status'),
            'reason_for_rejection' => $request->input('reason_for_rejection')
        ]);

        if ($request->input('status') === 'Approved') {
           return sendWithSMSONLINEGH(
                '233' . substr($request->input('contact'), -9),
                'Your request to work at ' . $request->input('hospital') . ' has been '.$request->input('status').'.Thank you!.'
            );
        } else {
            sendWithSMSONLINEGH(
                '233' . substr($request->input('contact'), -9),
                'Sorry your request to work at ' . $request->input('hospital') . ' has been ' . $request->input('status'). '. Reason: ' . $request->input('reason_for_rejection') . '. Thank you!.'
            );
        }

        return new HospitalRequestResource($hospital_request);
    }
}
