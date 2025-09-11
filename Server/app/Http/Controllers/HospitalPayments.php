<?php

namespace App\Http\Controllers;

use App\Http\Resources\HospitalPaymentsResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class HospitalPayments extends Controller
{

    public function store(Request $request, $id)
    {
        $selectedLabsIds = $request->input('selectedLabsIds') ?? [];  // ✅ fixed
        $labNames = [];
        $totalLabAmount = 0;

        if (!empty($selectedLabsIds)) {
            foreach ($selectedLabsIds as $labId) {
                $lab = \App\Models\LabManagement::find($labId);
                if ($lab) {
                    $labNames[] = $lab->name;
                    $totalLabAmount += $lab->price;
                }
            }
        }

        $selectedDrugIds = $request->input('selectedDrugIds') ?? []; // ✅ fixed
        $drugNames = [];
        $totalDrugAmount = 0;

        if (!empty($selectedDrugIds)) {
            foreach ($selectedDrugIds as $drugId) {
                $drug = \App\Models\Pharmacy::find($drugId);
                if ($drug) {
                    $drugNames[] = $drug->name;
                    $totalDrugAmount += $drug->price;
                }
            }
        }

        $payment = \App\Models\HospitalPayments::create([
            'reasonForPayment' => $request->input('reasonForPayment'),
            'selectedLabsIds' => json_encode($selectedLabsIds),   // ✅ fixed
            'labNames' => json_encode($labNames),
            'totalLabAmount' => $totalLabAmount,
            'selectedDrugIds' => json_encode($selectedDrugIds),   // ✅ fixed
            'drugNames' => json_encode($drugNames),
            'totalDrugAmount' => $totalDrugAmount,
            'consultationAmount' => $request->input('consultationAmount'),  // ✅ fixed
            'hospital_id' => $id,
        ]);

        return new HospitalPaymentsResource($payment);
    }


    public function fetchHospitalPayments($id)
    {
       $payments = \App\Models\HospitalPayments::where('hospital_id', $id)->get();

       return  HospitalPaymentsResource::collection($payments);

    }

    public function fetchLastHospitalPayments($id)
    {
        $payment = \App\Models\HospitalPayments::where('hospital_id', $id)->latest()->first();
        return new HospitalPaymentsResource($payment);
    }

}
